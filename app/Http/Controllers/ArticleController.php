<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Callus;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Newsletter;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Time;

class ArticleController extends Controller
{
    /*
     *
     *
     * see fist page
     *
     *
     * */
    public function index()
    {
        $articles = Article::where('status' == 1)->paginate(5);
        $categories = Category::where('status' == 1)->get();
        return view('indexes.index', compact('articles', 'categories'));
    }

    /*
     *
     *
     * admin list panel
     *
     *
     * */
    public function list()
    {
        $categories = Category::paginate(5);
        $newsletters = Newsletter::paginate(5);
        $articles = Article::paginate(5);
        $calluses = Callus::paginate(5);
        $comments = Comment::paginate(5);
        $users = User::paginate(5);
        return view('admin.adminTemp.articleList', compact('categories', 'newsletters', 'articles', 'calluses', 'comments', 'users'));
    }

    /*
     *
     *
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
     *
     *
     * send article
     *
     *
     * */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'subcategory' => 'required',
            'title' => 'required|min:5',
            'body' => 'required|min:50',
            'pic' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required|min:50|max:255',
        ]);
        $title = $request->title;
        $body = $request->body;
        $description = $request->description;
        $image = $request->file('pic');
        $sub_cat_id = $request->subcategory;
        $cat_id = $request->category;
        $imageName = time() . "_" . $image->extension();
        $image->move(public_path('/public/uploads'), $imageName);
        $article = new Article();
        $article->pic = $imageName;
        $article->body = $body;
        $article->title = $title;
        $article->description = $description;
        $article->sub_cat_id = $sub_cat_id;
        $article->cat_id = $cat_id;
        $article->status = 1;
        $article->user_id = user();
        $article->save();
//        $name = $request->file('image')->getClientOriginalName();
//        $path = $request->file('image')->store('public/uploads');
//        Article::create(
//            [
//                'title' => $request['title'],
//                'pic' => $name,
//                'path' => $path,
//                'body' => $request['body'],
//                'description' => $request['description'],
//                'cat_id' => $request['category'],
//                'sub_cat_id' => $request['subcategory'],
//                'status' => 1,
//            ]);
        return redirect('admin.adminTemp.articleForm')->with('status', 'فرم ارسال شد ');
    }

    /*
     *
     *
     * send category
     *
     * */
    public function storeCat()
    {
        return view('admin.adminTemp.articleForm');
    }
}
