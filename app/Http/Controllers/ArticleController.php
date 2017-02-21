<?php

namespace App\Http\Controllers;

use App\Article;

class ArticleController extends Controller
{
    public function index()
    {

        $articles = Article::get();

        return view('article.index', compact('articles'));
    }


    public function detail($slug)
    {
        if(!Article::slugIsExists($slug))
        {
            abort(404);
        }
        $article = Article::where(['slug' => $slug])->get();
        if($article->isEmpty())
        {
            abort(404);
        }
        $article = $article[0];
        $title = $article->title;

        return view('article.detail', compact('article', 'title'));
    }
}
