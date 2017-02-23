<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use Carbon\Carbon;
use Dingo\Api\Http\Middleware\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('layouts.app');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        $slug = $request->input('slug');
        if(isset($slug) && Article::slugIsExists($slug))
        {
            $article = Article::where(['slug' => $slug])->first();
            if(empty($article))
            {
                abort(404);
            }
        }
        else
        {
            $article = new Article();
            $article->title = '';
            $article->subtitle = '';
            $article->markdown_content = '';
            $article->created_at = Carbon::now()->toDateTimeString();
            $article->author = \Auth::user()->name;
            $article->article_type = 1;
            $article->category_id = 10;
            $article->comment_enabled = 1;
            $article->is_publish = 0;
        }

        //获取所有文章种类
        $categories = Category::categories();

        //获取所有文章类型
        $articleTypes = Article::articleTypes();

        return view('admin.article.create', compact('categories', 'article', 'articleTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = \Auth::user();
        if ($user->name != env('SUPER_ADMIN_NAME'))
        {
            return response(json_encode(['permission' => ['暂不对其他用户开放保存文章功能哟']]), 422);
        }

        $rules = [
            'title' => 'required|unique:articles|max:255',
            'subtitle' => 'required',
            'article_type' => 'required|numeric',
            'category_id' => 'required|numeric',
            'markdown_content' => 'required',
            'raw_content' => 'required',
            'comment_enabled' => 'required|numeric',
            'is_publish' => 'required|numeric',
        ];

        if($request->has('id') && $request->input('id') > 0)
        {
            $rules['title'] = ['required', Rule::unique('articles')->ignore($request->input('id')),'max:255'];
            $articleModel = Article::find($request->input('id'));
        }
        else
        {
            $articleModel = new Article();
        }

        //验参
        $this->validate($request, $rules, [
            'title.required' => '文章标题不能为空',
            'title.unique' => '文章标题已经存在',
            'subtitle.required' => '文章副标题不能为空',
            'article_type.numeric' => '文章类型必须为数字',
            'markdown_content.required' => '文章内容不能为空',
        ]);

        $article = $articleModel->saveArticle($request->input());
        if($article)
        {
            $article->redirectTo = route('article.detail', ['slug' => $article->slug]);
            return response()->json($article);
        }

        return response(json_encode(['internal' => ['保存失败']]), 422);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
