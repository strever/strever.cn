<?php

namespace App\Http\Controllers;

use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articleModel = new Article();

        $articleModel->slugs();

        return view('article.index');
    }


    public function detail(Article $article)
    {
        return view('article.detail', compact('article'));
    }
}
