<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProverbRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Proverb;
use App\Models\Tag;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class ProverbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proverbs = Proverb::with('categories', 'tags')->get();

        return view('admin.proverbs.index', compact('proverbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.proverbs.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProverbRequest $request)
    {
        $validated = $request->validated();
        $proverb = Proverb::create($validated + ['author_id' => auth()->id()]);

        if ($request->has('categories')) {
            $proverb->categories()->attach($request->categories);
        }

        if ($request->has('tags')) {
            $proverb->tags()->attach($request->tags);
        }

        return redirect()->route('admin.proverbs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proverb  $proverb
     * @return \Illuminate\Http\Response
     */
    public function show(Proverb $proverb)
    {
        return view('admin.proverbs.show', [
            'proverb' => $proverb,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proverb  $proverb
     * @return \Illuminate\Http\Response
     */
    public function edit(Proverb $proverb)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.proverbs.edit', compact('proverb', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proverb  $proverb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proverb $proverb)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'categories' => 'array',
            'categories.*' => 'exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ];
    
        $validatedData = $request->validate($rules);
    
        // Update the proverb with validated data
        $proverb->update($validatedData);
        //$proverb->update($request->all());
        
        //$proverb->categories()->sync($request['categories']);
        //$proverb->tags()->sync($request['tags']);

        $proverb->categories()->sync($request->input('categories', []));
        $proverb->tags()->sync($request->input('tags', []));

        return redirect()->route('admin.proverbs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proverb  $proverb
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proverb $proverb)
    {
        $proverb->delete();

        return redirect()->route('admin.proverbs.index');
    }
}