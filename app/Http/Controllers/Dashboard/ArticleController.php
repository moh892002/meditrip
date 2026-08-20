<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('author')->latest()->paginate(15);

        return view("dashboard.articles.index", compact("articles"));
    }

    public function create()
    {
        $users = User::orderBy('name')->get();

        return view("dashboard.articles.create", compact("users"));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string|max:255",
            "content" => "required|string",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "user_id" => "required|exists:users,id",
            "category" => "nullable|string|max:255",
            "published_at" => "nullable|date",
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images/articles', 'imageDisk');
        }

        Article::create($validated);

        return redirect()->route("dashboard.articles.index")->with("success", "تم إضافة المقال بنجاح.");
    }

    public function show(Article $article)
    {
        $article->load('author');

        return view("dashboard.articles.show", compact("article"));
    }

    public function edit(Article $article)
    {
        $users = User::orderBy('name')->get();

        return view("dashboard.articles.edit", compact("article", "users"));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            "name" => "sometimes|required|string|max:255",
            "content" => "sometimes|required|string",
            "image" => "sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "user_id" => "sometimes|required|exists:users,id",
            "category" => "sometimes|nullable|string|max:255",
            "published_at" => "sometimes|nullable|date",
        ]);

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('imageDisk')->delete($article->image);
            }

            $validated['image'] = $request->file('image')->store('images/articles', 'imageDisk');
        }

        $article->update($validated);
        return redirect()->route("dashboard.articles.index")->with("success", "تم تحديث المقال بنجاح.");
    }

    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('imageDisk')->delete($article->image);
        }

        $article->delete();
        return redirect()->route("dashboard.articles.index")->with("success", "تم حذف المقال بنجاح.");
    }
}
