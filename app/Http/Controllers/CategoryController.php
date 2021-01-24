<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /*
     * send category form
     *
     *
     * */
    public function index()
    {
        return view('admin.adminTemp.categoryForm');
    }

    /*
     * show category list
     *
     *
     * */
    public function show()
    {
        $categorys = 0;
        return view('admin.adminTemp.articleForm', compact('categorys'));

    }

    /*
     * show sub category list
     *
     *
     * */
    public function check()
    {

        return view('admin.adminTemp.articleForm');

    }
}
