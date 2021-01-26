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
        if (!empty('subcategory')) {
            $parent = Category::findorfail($request['subcategory'])->level;
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
        return view('admin.adminTemp.categoryForm');
//        return redirect('/categoryList');
    }

    /*
     *
     *
     * delete category
     * edit category
     * store edit category
     *
     * */
    public function delete(Request $request)
    {
        Category::where('id', $request['id'])->update(['status' => '0']);
        return back();
    }

    public function edit(Request $request)
    {
        $editCat = Category::where('id', $request['id']);
        return view('admin.adminTemp.categoryFormEdit', compact('editCat'));
    }

    public function storeEdit(Request $request)
    {
        Category::where('id', $request['id'])->update(['name' => $request['name']]);
        return back();
    }
}
