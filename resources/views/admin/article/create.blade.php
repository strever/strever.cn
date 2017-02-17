@extends('common.app')

@section('head')

@endsection

@section('content')

    <div class="row">

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
                    <label for="content" class="control-label col-lg-3">文章内容</label>
                    <div class="col-lg-9">
                        <textarea class="form-control" rows="20" v-model="article.content">
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
                    content: '',
                    created_at: new Date().toLocaleString(),
                    published_at: 1472222333,
                    author: 'strever'
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