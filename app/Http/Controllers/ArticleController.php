<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;

class ArticleController extends Controller
{
    public function index()
    {

        $articles = Article::where(['is_publish' => 1])->orderBy('published_at', 'desc')->simplePaginate(3);

        $slug = 'home';

        return view('article.index', compact('articles', 'slug'));
    }


    public function detail($slug)
    {
        if(!Article::slugIsExists($slug))
        {
            abort(404);
        }
        $article = Article::where(['slug' => $slug, 'is_publish' => 1])->first();
        if(empty($article))
        {
            abort(404);
        }
        $title = $article->title;

        return view('article.detail', compact('article', 'title', 'slug'));
    }

    public function category($slug)
    {
        $category = Category::where(['slug' => $slug])->first();
        if(empty($category))
        {
            abort(404);
        }

        $title = $category->name;
        $articles = Article::where(['category_id' => $category->id])->orderBy('published_at', 'desc')->simplePaginate(3);

        return view('article.index', compact('articles', 'title', 'slug'));

    }
}
