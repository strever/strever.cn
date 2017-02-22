<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

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
    public function create()
    {
        $categories = Category::categories();
        $categories = json_encode($categories);

        return view('admin.article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //验参
        $this->validate($request, [
            'title' => 'required|unique:articles|max:255',
            'subtitle' => 'required',
            'article_type' => 'required|numeric',
            'category_id' => 'required|numeric',
            'markdown_content' => 'required',
            'raw_content' => 'required',
            'comment_enabled' => 'required|numeric',
            'is_publish' => 'required|numeric',
        ], [
            'title.required' => '文章标题不能为空',
            'title.unique' => '文章标题已经存在',
            'subtitle.required' => '文章副标题不能为空',
            'article_type.numeric' => '文章类型必须为数字',
            'markdown_content.required' => '文章内容不能为空',
        ]);

        $articleModel = new Article();
        $res = $articleModel->createArticle($request->input());

        return response()->json($res);

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
