<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProverbRequest;
use App\Models\Category;
use App\Models\Proverb;
use App\Models\Tag;
use Illuminate\Http\Request;

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

        return view('proverbs.index', compact('proverbs'));
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

        return view('proverbs.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProverbRequest $request)
    {
        $proverb = Proverb::create([
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
            'tag_id' => $request->input('tag_id'),
            'author_id' => auth()->id(),
        ]);

        if ($request->has('categories')) {
            $proverb->categories()->attach($request->categories);
        }

        if ($request->has('tags')) {
            $proverb->tags()->attach($request->tags);
        }

        return redirect()->route('proverbs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proverb  $proverb
     * @return \Illuminate\Http\Response
     */
    public function show(Proverb $proverb)
    {
        //
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

        return view('proverbs.edit', compact('proverb', 'categories', 'tags'));
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
        $proverb->update([
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
            'tag_id' => $request->input('tag_id'),
        ]);

        return redirect()->route('proverbs.index');
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

        return redirect()->route('proverbs.index');
    }
}