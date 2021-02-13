<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\Factory;
use Illuminate\View\View;

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
        $subCat = Category::withTrashed()->get();
        return view('admin.adminTemp.categoryForm', compact('subCat'));
    }

    public function CatList(): Factory|View|Application
    {
        $categories = Category::withTrashed()->paginate(5);
        return view('admin.adminTemp.categorylist', compact('categories'));
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
        $subcategories = Category::where('parent_id', $cat_id)->withTrashed()->get();
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
        $articles = Article::where('sub_category', $id)->withTrashed()->get();
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
            $category->save();
        } else {

            $parent = Category::findorfail($request->subCategory)->level;
            $category = new Category;
            $category->name = $request->category;
            $category->parent_id = $request->subCategory;
            $category->level = $parent + 1;
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
    public function destroy($id)
    {
        $deleted_at = Category::where('id', $id)->withTrashed()->first();
        if ($deleted_at['deleted_at'] != null) {
            $deleted_at->restore();
        } else {
            $deleted_at->delete();
        }
        return redirect()->back()->with('success', 'وضعیت تغیر کرد');
    }

    public function edit($id)
    {
        $editCat = Category::where('id', $id)->get();
        return view('admin.adminTemp.categoryFormEdit', compact('editCat'));
    }

    public function storeEdit(Request $request): RedirectResponse
    {
        Category::where('id', $request['id'])->update(['name' => $request['name']]);
        return back()->with('success', 'ویرایش شد');
    }

    public function subcategory($id)
    {
        $articles = Article::where('sub_category', $id)->paginate(2);
        $parent=Category::findorfail($id);
        $categories = Category::where("deleted_at", null)->get();
        $articleView = Article::orderby('countViews', 'desc')->first();
        return view('indexes.index', compact('articles', 'categories', 'articleView','parent'));
    }
}
