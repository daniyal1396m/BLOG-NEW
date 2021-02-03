<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
//    public function store(Request $request): RedirectResponse
    public function store(Article $article): RedirectResponse
    {
        $this->validate(request(), [
            'name' => 'required|min:5|max:15',
            'email' => 'required|min:10|max:70',
            'message' => 'required|min:10|max:150',
        ]);
        $comment = $article->comments()->create(\request()->all());
        if ($comment) {
            return redirect()->back()->with('status', 'فرم ارسال شد');
        } else {
            return redirect()->back()->with('status', 'فرم ارسال نشد');
        }
    }
}
