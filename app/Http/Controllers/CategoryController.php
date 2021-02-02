<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Compound;
use Symfony\Component\Console\Input\Input;

class CategoryController extends Controller
{
    /*
     *
     *
     * send category form
     *
     *
     * */
    public function index(Request $request)
    {
        $subCat = Category::where(['status' => 1])->get();
        return view('admin.adminTemp.categoryForm', compact('subCat'));
    }

    /*
     *
     *
     * show sub category list
     *
     *
     * */
    public function check($cat_id): JsonResponse
    {
//        $subcategories = Category::where('parent_id', $cat_id)->where('status', 1)->where('level', '>', 1);
        $subcategories = Category::where('parent_id', $cat_id)->where('status', 1)->get();
        return response()->json(['child' => $subcategories]);
    }

    /*
     *
     *
     * find post subcategory
     *
     *
     * */
    public function find($id)
    {
        $articles = Article::where('sub_category', $id)->where('status', 1)->get();
        return view('indexes.index', compact('articles'));
    }

    /*
     *
     *
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
            $category = new Category;
            $category->name = $request->category;
            $category->level = 1;
            $category->status = 1;
            $category->save();
        } else {

            $parent = Category::findorfail($request->subCategory)->level;
            $category = new Category;
            $category->name = $request->category;
            $category->parent_id = $request->subCategory;
            $category->level = $parent + 1;
            $category->status = 1;
            $category->save();

        }
        return back()->with('success', 'دسته بندی  ارسال شد ');
    }

    /*
     *
     *
     * delete category
     *
     *
     * edit category
     *
     *
     * store edit category
     *
     *
     * */
    public function update($id): RedirectResponse
    {
        $status = Category::find($id);
        if ($status['status'] == 0) {
            $status->update(['status' => '1']);
        } else {
            $status->update(['status' => '0']);
        }
        return redirect()->back()->with('success', 'وضعیت تغیر کرد');
    }

    public function edit($id)
    {
        $editCat = Category::where('id',$id)->get();
        return view('admin.adminTemp.categoryFormEdit', compact('editCat'));
    }

    public function storeEdit(Request $request): RedirectResponse
    {
        Category::where('id', $request['id'])->update(['name' => $request['name']]);
        return back()->with('success', 'ویرایش شد');
    }
}
