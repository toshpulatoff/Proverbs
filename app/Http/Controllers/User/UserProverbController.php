<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Proverb;
use App\Models\Category;
use App\Models\ProverbTranslation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class UserProverbController extends Controller
{
    /**
     * Display a listing of proverbs for users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $proverbs = Proverb::withTranslation()
        //     ->translatedIn(app()->getLocale())
        //     ->get();

        $categories = Category::all();
        $proverbs = Proverb::translated()->paginate(4);

        return view('user.proverbs.index', compact('proverbs', 'categories'));
    }

    /**
     * Display the specified proverb for users.
     *
     * @param  \App\Models\Proverb  $proverb
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::all();
        $proverb = Proverb::findOrFail($id);

        $proverbTags = $proverb->tags()->pluck('id')->toArray();

        $similarProverbs = Proverb::whereHas('tags', function ($query) use ($proverbTags) {
            $query->whereIn('id', $proverbTags);
        })
            ->where('id', '!=', $id)
            ->inRandomOrder()
            ->take(2)
            ->get();

        return view('user.proverbs.show', compact('proverb', 'categories', 'similarProverbs'));
    }

    public function proverbsByCategory($categorySlug)
    {
        // Retrieve the selected category by its ID.
        $category = Category::where('slug', $categorySlug)->firstOrFail();

        $categories = Category::all();
        $proverbs = Proverb::translated();

        // Retrieve related proverbs for the selected category.
        $relatedProverbs = $category->proverbs()
            ->with('translations') // Load proverb translations if needed
            ->paginate(4);

        return view('user.proverbs.by_category', [
            'category' => $category,
            'relatedProverbs' => $relatedProverbs,
            'categories' => $categories,
            'proverbs' => $proverbs,
        ]);
    }

    public function search(Request $request)
    {
        $term = $request->input('query');
        $categories = Category::all();

        // Perform a search on the Proverb model using the 'content' attribute.
        $proverbs = Proverb::whereHas('proverb_translations', function ($query) use ($term) {
            $query->where('content', 'like', '%' . $term . '%');
        })
            ->paginate(4);
        // ->where('proverb_translations.content', 'like', '%' . $query . '%');

        $resultCount = $proverbs->total();

        return view('user.proverbs.index', compact('proverbs', 'categories', 'resultCount'))->with('query', $term);
    }
}
