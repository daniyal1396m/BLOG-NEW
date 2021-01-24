<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /*
     *
     * see fist page
     *
     *
     * */
    public function index()
    {
        return view('indexes.index');
    }

    /*
     * admin list panel
     *
     *
     * */
    public function list()
    {
        return view('admin.adminTemp.articleList');
    }

    /*
     * admin form  for send
     *
     *
     * */
    public function form()
    {
        return view('admin.adminTemp.articleForm');
    }

    /*
    * send article
    *
    * */
    public function store()
    {
        return view('admin.adminTemp.articleForm');
    }

    /*
     * send category
     *
     * */
    public function storeCat()
    {
        return view('admin.adminTemp.articleForm');
    }
}
