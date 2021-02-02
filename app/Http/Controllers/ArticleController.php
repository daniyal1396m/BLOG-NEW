<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Callus;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Newsletter;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\RedirectResponse;
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
        $categories = Category::where(['status' => 1])->get();
        $articlesViews = Article::findorfail('countViews' > 9)->get();
        return view('indexes.index', compact('articles', 'categories', 'articlesViews'));
    }

    /*
     *
     *
     * see single page
     *
     *
     * */
    public function single($id)
    {

        $articles = Article::where('id', $id)->get();
//        $articles->increments('countViews');
        $categories = Category::where(['status' => 1])->get();
//        $articles->increment('countViews');
        return view('indexes.indexFiles.single-post', compact('articles', 'categories'));
    }

    /*
     *
     *
     * admin list panel
     *
     *
     * */
    public function Artlist()
    {
        $articles = Article::paginate(5);
        return view('admin.adminTemp.articleList', compact('articles'));
    }

    /*
    *
    *
    * admin list panel
    *
    *
    * */
    public function newslist()
    {
        $newsletters = Newsletter::paginate(5);
        return view('admin.adminTemp.newsletterlist', compact('newsletters'));
    }

    /*
    *
    *
    * admin list panel
    *
    *
    * */
    public function CatList()
    {
        $categories = Category::paginate(5);
        return view('admin.adminTemp.categorylist', compact('categories'));
    }

    /*
    *
    *
    * admin list panel
    *
    *
    * */
    public function AdList()
    {
        $users = User::paginate(5);
        return view('admin.adminTemp.adminslist', compact( 'users'));
    }/*
    *
    *
    * admin list panel
    *
    *
    * */
    public function CallList()
    {
        $calluses = Callus::paginate(5);
        return view('admin.adminTemp.callUsListMsg', compact( 'calluses'));
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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'category' => 'required',
            'sub_category' => 'required',
            'title' => 'required|min:5|max:30',
            'body' => 'required|min:10|max:50',
            'image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required|min:50|max:10000',
        ]);
        $year = Carbon::now()->year;
        $imagePath = "uploads/images/{$year}/";
        $image = time() . $request['image']->getClientOriginalName();
        $pic = $request['image']->move($imagePath, $image);
        $article = Article::create(array_merge($request->all(), ['user_id' => Auth::id(), 'status' => 1, 'slug' => $request['title'], 'image' => $pic]));
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
