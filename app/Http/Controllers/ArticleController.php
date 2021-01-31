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
use Illuminate\Support\Facades\Auth;
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
        $articles = Article::where('status', 1)->paginate(5);
        $categories = Category::where('status', 1)->get();
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
            'sub_category' => 'required',
            'title' => 'required|min:5',
            'body' => 'required|min:50',
            'pic' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required|min:50|max:255',
        ]);
        $image = $request->file('pic');
        $imageName = time() . "_" . $image->extension();
        $image->move(public_path('/public/uploads'), $imageName);
        $article = Article::create(array_merge($request->all(), ['user_id' => Auth::id(), 'status' => 1, 'pic' => $imageName]));
        if ($article) {
            return redirect()->back()->with('status', 'فرم ارسال شد');
        } else {
            return redirect()->back()->with('status', 'فرم ارسال نشد ');
        }
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
