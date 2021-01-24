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
        $categories = DB::table('category')->where("parent_id", "null")->get();
        return view('admin.adminTemp.articleForm', compact('categories'));

    }

    /*
     * show sub category list
     *
     *
     * */
    public function check()
    {
        $subcat = DB::table('categories')->where(['parent_id'=>'category_id', 'status'=>'1'])->get();
        return view('admin.adminTemp.articleForm', compact('subcat'));

    }
    /*
     * add category
     *
     *
     * */
    public function add()
    {

        return view('admin.adminTemp.articleForm');

    }
}
