<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use App\Mail\ResponseMail;
use App\Models\Callus;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class CallusController extends Controller
{
    public function show($id): Factory|View|Application
    {
        $singleMsg = Callus::where('id', $id)->first();
        return view('admin.adminTemp.singleMsgForm', compact('singleMsg'));
    }

    public function sendEmail(Request $request): RedirectResponse
    {
        $details = [
            'title' => 'پاسخ به پیغام شما توسط ایمیل تست',
            'body' => $request->description,
        ];
        Mail::to($request['email'])->send(new ResponseMail($details));
        return redirect()->back()->with('success', 'ارسال شد ');
    }
}
