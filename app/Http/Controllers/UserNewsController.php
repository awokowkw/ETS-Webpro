<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class UserNewsController extends Controller
{
    public function index()
    {
        $news = News::latest('published_at')->paginate(6);
        return view('user.news.index', compact('news'));
    }

    public function show($id)
    {
        $article = News::findOrFail($id);
        return view('user.news.show', compact('article'));
    }
}
