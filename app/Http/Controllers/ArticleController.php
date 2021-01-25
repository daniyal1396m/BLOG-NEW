<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use DB;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Time;

class ArticleController extends Controller
{
    /*
     *
     * see fist page
     *
     *
     * */
    public function index()
    {
        return view('indexes.index');
    }

    /*
     * admin list panel
     *
     *
     * */
    public function list()
    {
        return view('admin.adminTemp.articleList');
    }

    /*
     * admin form  for send
     *
     *
     * */
    public function form()
    {
        $categories = Category::where(['parent_id' => null, 'status' => 1])->get();
        return view('admin.adminTemp.articleForm', compact('categories'));
    }

    /*
    * send article
    *
    * */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'subcategory' => 'required',
            'title' => 'required|min:5',
            'body' => 'required|min:50',
            'pic' => 'required',
        ]);
        $name = $request->name;
        $img = $request->file('file');
        $imgName = time() . '_' . $img->extension();
        $img->move(public_path('uploads'), $imgName);

        $article = new Article();
        $article->name = $name;
//        $article->;

        Category::create(
            [
                'title' => $request['title'],
                'pic' => $request['pic'],
                'body' => $request['title'],
                'cat_id' => $request['category'],
                'sub_cat_id' => $request['subcategory'],
                'status' => 1,
                ]);
        return view('admin.adminTemp.articleForm');
    }

    /*
     * send category
     *
     * */
    public function storeCat()
    {
        return view('admin.adminTemp.articleForm');
    }
}
