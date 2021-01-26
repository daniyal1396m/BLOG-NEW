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
        if (empty($request['subCategory'])) {
            Category::create(
                [
                    'name' => $request['category'],
                    'level' => 1,
                    'status' => 1,
                ]);
        } else {
            echo 1;
            $parent = Category::findorfail($request->subCategory)->level;
//            $parent = Category::findorfail($request['subCategory'])->level;
            Category::create(
                [
                    'name' => $request['category'],
                    'parent_id' => $request['subCategory'],
                    'level' => $parent + 1,
                    'status' => 1,
                ]);
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
        Category::find('status')->where('id', $request['id']);
        if ('status' === 0) {
            Category::where('id', $request['id'])->update(['status' => '1']);
        } else {
            Category::where('id', $request['id'])->update(['status' => '0']);
        }
        return back();
    }

    public function edit($id)
    {
        $editCat = Category::findorfail($id);
        return view('admin.adminTemp.categoryFormEdit', compact('editCat'));
    }

    public function storeEdit(Request $request): RedirectResponse
    {
        Category::find('id', $request['editId'])->update(['name' => $request['name']]);
        return back();
    }
}
