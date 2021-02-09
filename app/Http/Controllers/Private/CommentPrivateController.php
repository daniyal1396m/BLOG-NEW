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
        $comments = Comment::get();
        return view('admin.adminTemp.commentList', compact('comments'));
    }

    public function destroy($id): RedirectResponse
    {
        $status = Comment::where('id', $id)->first();
        if ($status['status'] == 0) {
            $status->update(['status' => 1]);
        } else {
            $status->update(['status' => 0]);
        }
        return redirect()->back()->with('success', 'وضعیت تغیر کرد');
    }
}
