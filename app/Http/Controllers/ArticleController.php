<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('indexes.index');
    }

    public function list()
    {
        return view('admin.adminTemp.articleList');
    }

    public function form()
    {
        return view('admin.adminTemp.articleForm');
    }
}
