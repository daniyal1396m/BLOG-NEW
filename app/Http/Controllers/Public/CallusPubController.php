<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Callus;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CallusPubController extends Controller
{
    public function index()
    {
        $articles = Article::where("deleted_at", null)->take(5);
        $categories = Category::where("deleted_at", null)->get();
        $articleView = Article::orderby('countViews', 'desc')->first();
        return view('indexes.indexFiles.contact', compact('categories', 'articles', 'articleView'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|min:10|max:60',
            'email' => 'required|min:20|max:100|email',
            'subject' => 'required|min:15|max:20',
            'message' => 'required|min:50|max:150',
        ]);
        $call = Callus::create($request->all());
        if ($call) {
            return redirect()->back()->with('session', 'فرم ارسال شد');
        } else {
            return redirect()->back()->with('session', 'فرم ارسال شد');
        }

    }

}
