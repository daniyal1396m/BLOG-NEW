<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class NewsletterController extends Controller
{
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'email' => 'required'
        ]);
        $news = new Newsletter;
        $news->email = $request->email;
        $news->save();
        return back();

    }
}
