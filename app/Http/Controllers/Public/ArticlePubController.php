<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ArticlePubController extends Controller
{
    public function index(): Factory|View|Application
    {
        $articles = Article::paginate(3);
        $categories = Category::where("deleted_at", null)->get();
        $articleView = Article::orderby('countViews', 'desc')->first();
        return view('indexes.index', compact('articles', 'categories', 'articleView'));
    }

    public function single($id): Factory|View|Application
    {
        $article = Article::where('id', $id)->first();
        $categories = Category::where("deleted_at", null)->get();
        $comments = $article->comments()->where("status", 1)->get();
        $count = $article->countViews + 1;
        $article->update(['countViews' => $count]);
        return view('indexes.indexFiles.single-post', compact('article', 'categories', 'comments'));
    }
}
