@extends('common.app')

@section('head')

    <link rel="stylesheet" href="/css/github-markdown.css">
    <script src="https://unpkg.com/marked@0.3.6"></script>

@endsection

@section('content')

    <div class="row">

        <div id="vue">
            <h2 class="text-center">新增文章</h2>

            <div class="col-lg-6">

                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="title" class="control-label col-lg-3">标题</label>
                        <div class="col-lg-9">
                            <input type="text" name="title" v-model="article.title" class="form-control">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="sub_title" class="control-label col-lg-3">副标题</label>
                        <div class="col-lg-9">
                            <input type="text" name="sub_title" v-model="article.sub_title" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="markdown_content" class="control-label col-lg-3">文章内容</label>
                        <div class="col-lg-9">
                        <textarea class="form-control" rows="20" v-model="article.markdown_content">
                        </textarea>
                            <p class="help-block">Example block-level help text here.</p>
                        </div>


                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <label>
                                <input type="checkbox"> Check me out
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="article_type" class="col-lg-3">文章类型</label>
                        <div class="col-lg-9">
                            <label class="radio-inline">
                                <input type="radio" name="article_type" v-model="article.article_type" value="1"> 原创
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="article_type" v-model="article.article_type" value="2"> 转载
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="article_type" v-model="article.article_type" value="3"> 改编
                            </label>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="category_id" class="col-lg-3">文章分类</label>
                        <div class="col-lg-9">
                            <label class="radio-inline" v-for="category in categories">
                                <input type="radio" name="category_id" v-model="article.article_type" value="1"> 原创
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="article_type" v-model="article.article_type" value="2"> 转载
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="article_type" v-model="article.article_type" value="3"> 改编
                            </label>
                        </div>

                    </div>


                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <button v-on:click.stop.prevent="createArticle" class="btn btn-default">保存</button>
                        </div>
                    </div>

                </form>

            </div>


            <div class="col-lg-6">

                @include('partials.article')

            </div>
        </div>

    </div>





@endsection


@section('js')

    <script>
        var vue = new Vue({

            //delimiters: ['[[', ']]'],

            el: '#vue',

            data: {
                article: {
                    title: '',
                    sub_title: '',
                    markdown_content: '',
                    created_at: new Date().toLocaleString(),
                    published_at: 1472222333,
                    author: 'strever'
                }
            },

            computed: {
                markedContent: function() {
                    marked.setOptions({
                        renderer: new marked.Renderer(),
                        gfm: true,
                        tables: true,
                        breaks: false,
                        pedantic: false,
                        sanitize: true,
                        smartLists: true,
                        smartypants: false
                    });
                    return marked(this.article.markdown_content, { sanitize: true });
                }
            },

            methods: {
                createArticle: function () {
                    console.log(this.article);
                    /*axios.post('/article/store', this.article).then(function (resp) {
                        console.log(resp);
                    }, function (resp) {
                        console.log(resp);
                    });*/
                },

                preview: function () {

                }
            }

        });
    </script>


@endsection