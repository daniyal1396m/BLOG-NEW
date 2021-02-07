<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('admin.adminTemp.articleForm');
//        return view('home');
    }

    public function destroy($id): RedirectResponse
    {
        $deleted_at = User::where('id', $id)->withTrashed()->first();
        if ($deleted_at['deleted_at'] != null) {
            $deleted_at->restore();
        } else {
            $deleted_at->delete();
        }
        return redirect()->back()->with('success', 'وضعیت تغیر کرد');
    }
}
