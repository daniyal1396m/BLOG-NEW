<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Callus;
use App\Models\Category;
use App\Models\Newsletter;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Factory;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): Factory|View|Application
    {
        $articles = Article::paginate(3);
        $categories = Category::all();
        return view('admin.adminTemp.articleform', compact('categories'));
    }

    public function category(): Factory|View|Application
    {
        $categories = Category::where('parent_id', null)->get();
        return view('admin.adminTemp.articleForm', compact('categories'));
    }

    public function ArtList(): Factory|View|Application
    {
        $articles = Article::withTrashed()->paginate(3);
        return view('admin.adminTemp.articleList', compact('articles'));
    }

    public function NewsList(): Factory|View|Application
    {
        $newsletters = Newsletter::paginate(5);
        return view('admin.adminTemp.newsletterlist', compact('newsletters'));
    }


    public function AdList(): Factory|View|Application
    {
        $users = User::withTrashed()->paginate(5);
        return view('admin.adminTemp.adminslist', compact('users'));
    }

    public function CallList(): Factory|View|Application
    {
        $calluses = Callus::paginate(5);
        return view('admin.adminTemp.callUsListMsg', compact('calluses'));
    }

    public function form(): Factory|View|Application
    {
        $categories = Category::where('parent_id', null)->get();
        return view('admin.adminTemp.articleForm', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'category' => 'required',
            'sub_category' => 'required',
            'title' => 'required|min:5|max:30',
            'body' => 'required|min:10|max:50',
            'image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required|min:50',
        ]);
        $year = Carbon::now()->year;
        $imagePath = "uploads/images/{$year}/";
        $image = time() . $request['image']->getClientOriginalName();
        $pic = $request['image']->move($imagePath, $image);
        $article = Article::create(array_merge($request->all(), ['user_id' => Auth::id(), 'slug' => $request['title'], 'image' => $pic]));
        if ($article) {
            return redirect()->back()->with('status', 'فرم ارسال شد');
        } else {
            return redirect()->back()->with('status', 'فرم ارسال نشد ');
        }
    }

    public function imageUpload(): string
    {

        $this->validate(request(), [
            'upload' => 'required|mimes:jpeg,png,bmp',
        ]);

        $year = Carbon::now()->year;
        $imagePath = "/uploads/images/{$year}/";

        $file = request()->file('upload');
        $filename = $file->getClientOriginalName();

        if (file_exists(public_path($imagePath) . $filename)) {
            $filename = Carbon::now()->timestamp . $filename;
        }

        $file->move(public_path($imagePath), $filename);
        $url = url($imagePath . $filename);

        return "<script>window.parent.CKEDITOR.tools.callFunction(1 , '{$url}' , '')</script>";

    }

    public function edit($id): Factory|View|Application
    {
        $article = Article::where('id', $id)->first();
        $categories = Category::where('deleted_at', null)->get();
        return view('admin.adminTemp.articleFormEdit', compact('article', 'categories'));
    }

    public function storeEdit(Request $request, $id): RedirectResponse
    {
        $edit = Article::find($id);
        if (!empty($image)) {
            $year = Carbon::now()->year;
            $imagePath = "uploads/images/{$year}/";
            $image = time() . $request['image']->getClientOriginalName();
            $pic = $request['image']->move($imagePath, $image);
            $edit->update(array_merge($request->all(), ['user_id' => Auth::id(), 'slug' => $request['title'], 'image' => $pic]));
        } else {
            $edit->update(array_merge($request->all(), ['user_id' => Auth::id(), 'slug' => $request['title']]));
        }
        return redirect()->back()->with('status', 'ویرایش شد');
    }

    public function destroy($id): RedirectResponse
    {
        $deleted_at = Article::where('id', $id)->withTrashed()->first();
        if ($deleted_at['deleted_at'] != null) {
            $deleted_at->restore();
        } else {
            $deleted_at->delete();
        }
        return redirect()->back()->with('success', 'وضعیت تغیر کرد');
    }
}
