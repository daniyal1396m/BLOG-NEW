<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
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
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'category' => 'required',
        ]);

        if ($request['subCategory'] == 'میتوانید یکی را پدر ان قرار دهید') {

//                        Category::create(
//                [
//                    'name' => $request['category'],
//                    'level' => 1,
//                    'status' => 1,
//                ]);
            $category = new Category;
            $category->name = $request->category;
            $category->level = 1;
            $category->status = 1;
            $category->save();
        } else {

            $parent = Category::findorfail($request->subCategory)->level;
//            $parent = Category::findorfail($request['subCategory'])->level;
//            Category::create(
//                [
//                    'name' => $request['category'],
//                    'parent_id' => $request['subCategory'],
//                    'level' => $parent + 1,
//                    'status' => 1,
//                ]);
            $category = new Category;
            $category->name = $request->category;
            $category->parent_id = $request->subCategory;
            $category->level = $parent + 1;
            $category->status = 1;
            $category->save();

        }
        return back();
    }

    /*
     *
     * delete category
     * edit category
     * store edit category
     *
     * */
    public function delete(Request $request): RedirectResponse
    {

        Category::where('id', $request['id'])->update(['status' => '0']);
        return back();
    }

    public function edit($id)
    {
        $editCat = Category::where('id', $id)->get();
        return view('admin.adminTemp.categoryFormEdit', compact('editCat'));
    }

    public function storeEdit(Request $request): RedirectResponse
    {
        Category::where('id', $request['id'])->update(['name' => $request['name']]);
        return back();
    }
}
