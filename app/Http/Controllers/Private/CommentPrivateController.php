<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CommentPrivateController extends Controller
{
    public function index(): Factory|View|Application
    {
        $comments = Comment::withTrashed()->get();
        return view('admin.adminTemp.commentList', compact('comments'));
    }

    public function destroy($id): RedirectResponse
    {
        $deleted_at = Comment::where('id', $id)->withTrashed()->first();
        if ($deleted_at['deleted_at'] != null) {
            $deleted_at->restore();
        } else {
            $deleted_at->delete();
        }
        return redirect()->back()->with('success', 'وضعیت تغیر کرد');
    }
}
