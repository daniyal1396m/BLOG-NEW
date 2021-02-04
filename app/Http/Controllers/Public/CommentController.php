<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|min:5|max:15',
            'email' => 'required|min:10|max:70',
            'message' => 'required|min:10|max:150',
        ]);
        $comment = Comment::create(array_merge($request->all(), ['article_id', $id]));
        if ($comment) {
            return redirect()->back()->with('status', 'فرم ارسال شد');
        } else {
            return redirect()->back()->with('status', 'فرم ارسال نشد');
        }
    }
}
