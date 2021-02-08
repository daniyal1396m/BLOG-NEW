<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class CommentController extends Controller
{
    #[NoReturn] public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|min:5|max:15',
            'email' => 'required|min:10|max:70|email',
            'message' => 'required|min:10|max:150',
        ]);
        $comment = Comment::create($request->all());
        if ($comment) {
            return redirect()->back()->with('status', 'فرم ارسال شد');
        } else {
            return redirect()->back()->with('status', 'فرم ارسال نشد');
        }
    }

    public function replay(Request $request): RedirectResponse
    {
        $request->validate([
            'namereplay' => 'required|min:5|max:15',
            'emailreplay' => 'required|min:10|max:70|email',
            'messagereplay' => 'required|min:10|max:150',
        ]);
        $comment = Comment::create([
            'name' => $request['namereplay'],
            'email' => $request['emailreplay'],
            'message' => $request['messagereplay'],
            'parent_id' => $request['parent_id'],
            'article_id' => $request['article_id'],
            'deleted_at' => $request->delete()

        ]);
        if ($comment) {
            return redirect()->back()->with('status', 'فرم ارسال شد');
        } else {
            return redirect()->back()->with('status', 'فرم ارسال نشد');
        }
    }
}
