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
        $subCat = Category::where(['status' => 1])->get();
        return view('admin.adminTemp.categoryForm', compact('subCat'));
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
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
        ]);
        $parent = Category::findorfail($request['subcategory'])->level;
        if (empty('subcategory')) {
            Category::create(
                [
                    'name' => $request['category'],
                    'level' => $parent + 1,
                    'status' => 1,
                ]);
        } else {
            Category::create(
                [
                    'name' => $request['category'],
//                    'parent_id' => $request['subcategory'],
                    'level' => 1,
                    'status' => 1,
                ]);
        }
//        return view('admin.adminTemp.categoryForm');
        return redirect('/categoryList');
    }

    /*
     *
     *
     * delete category
     *
     * */
    public function delete(Request $request)
    {
        Category::where('id', $request['id'])->update(['status' => '0']);
        redirect('/Lists');
    }
}
