<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
//        dd(1111);
//        $categories = Category::(["parent_id" => "null", 'status' => 1])->get();
//        dd($categories);
////        return view('admin.adminTemp.articleForm', compact('categories'));

    }

    /*
     * show sub category list
     *
     *
     * */
    public function check()
    {
        $subCat = Category::where(['parent_id' => 'category_id', 'status' => '1'])->get();
        dd($subCat);
//        return view('admin.adminTemp.articleForm', compact(''));

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
           
        } else {
            echo 'no hello';
        }
        return view('admin.adminTemp.articleForm');
    }
}
