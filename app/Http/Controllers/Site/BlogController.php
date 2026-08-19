<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of articles grouped by category.
     */
    public function index(Request $request)
    {
        $categories = Article::query()
            ->select('category')
            ->whereNotNull('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        $articles = Article::with('author')
            ->when($request->filled('category'), function ($query) use ($request) {
                $query->where('category', $request->input('category'));
            })
            ->latest('published_at')
            ->paginate(9);

        return view('meditrip.blog', compact('articles', 'categories'));
    }

    /**
     * Display the specified article.
     */
    public function show(Article $article)
    {
        $article->load('author');

        $categories = Article::query()
            ->select('category')
            ->whereNotNull('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        $related = Article::where('id', '!=', $article->id)
            ->where(function ($query) use ($article) {
                $query->where('category', $article->category)->orWhereNotNull('category');
            })
            ->latest('published_at')
            ->take(3)
            ->get();

        $recent = Article::where('id', '!=', $article->id)
            ->latest('published_at')
            ->take(4)
            ->get();

        return view('meditrip.blog-details', compact('article', 'related', 'recent', 'categories'));
    }
}
