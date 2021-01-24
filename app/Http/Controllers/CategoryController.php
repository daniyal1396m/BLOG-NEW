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
$subcat=DB::table('categories')->where('parent_id','category_id')->get();
        return view('admin.adminTemp.articleForm',compact('subcat'));

    }
}
