<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Callus;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CallusController extends Controller
{
    public function index()
    {
        $articles = Article::where('status', 1)->take(5);
        $categories = Category::where(['status' => 1])->get();
        return view('indexes.indexFiles.contact', compact('categories', 'articles'));
    }

    public function store(Request $request): RedirectResponse
    {
//        dd($request->all());
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

    public function test()
    {
        $cats = Category::where('id',1)->with(['subcategories' => function ($query) {
            $query->where('status', 1);
        }])->get();
    }
}
