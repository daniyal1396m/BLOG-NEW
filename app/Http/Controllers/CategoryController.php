<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Compound;

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
        $categories = DB::table('categories')->where("parent_id", "null")->get();
        return view('admin.adminTemp.articleForm', compact('categories'));

    }

    /*
     * show sub category list
     *
     *
     * */
    public function check()
    {
        $subCat = DB::table('categories')->where(['parent_id' => 'category_id', 'status' => '1'])->get();
        return view('admin.adminTemp.articleForm', compact('subCat'));

    }

    /*
     * add category
     *
     *
     * */
    public function add(Request $request)
    {
        $request->validate([
            'category' => 'required',
        ]);
        if (empty('category')) {
            echo 'hello ';
        } else {
            echo 'no hello';
        }
        return view('admin.adminTemp.articleForm');
    }
}
