<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Callus;
use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Compound;

class CallusController extends Controller
{
    public function show($id): Factory|View|Application
    {
        $singleMsg = Callus::where('id', $id)->first();
        return view('admin.adminTemp.singleMsgForm', compact('singleMsg'));
    }

    public function store()
    {
        dd('hi');
    }
}
