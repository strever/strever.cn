@extends('common.app')

@section('head')

    <link rel="stylesheet" href="/css/github-markdown.css">
    <script src="https://unpkg.com/marked@0.3.6"></script>

@endsection

@section('container')

    <div class="row">

        <div id="vue">
            <h2 class="text-center">新增文章</h2>

            <div class="alert alert-danger" v-if="errorOccurred">
                <ul>
                    <li v-for="(error, field) in errors">@{{ field }} : @{{ error.join('') }}</li>
                </ul>
            </div>

            <div class="col-lg-6">

                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="title" class="control-label col-lg-3">标题</label>
                        <div class="col-lg-9">
                            <input type="text" name="title" v-model="article.title" class="form-control">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="subtitle" class="control-label col-lg-3">副标题</label>
                        <div class="col-lg-9">
                            <input type="text" name="subtitle" v-model="article.subtitle" class="form-control">
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
                                <input type="radio" name="category_id" v-model="article.category_id" v-bind:value="category.id"> @{{ category.name }}
                            </label>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="comment_enabled" class="col-lg-3">是否允许评论</label>
                        <div class="col-lg-9">
                            <label class="radio-inline">
                                <input type="radio" name="comment_enabled" v-model="article.comment_enabled" value="1"> 允许
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="comment_enabled" v-model="article.comment_enabled" value="0"> 禁止
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="is_publish" class="col-lg-3">是否立即发表</label>
                        <div class="col-lg-9">
                            <label class="radio-inline">
                                <input type="radio" name="is_publish" v-model="article.is_publish" value="1"> 是
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_publish" v-model="article.is_publish" value="0"> 否
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

                @include('admin.partials.article')

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
                    subtitle: '',
                    markdown_content: '',
                    created_at: new Date().toLocaleString(),
                    author: 'strever',
                    article_type: 1,
                    category_id: 8,
                    comment_enabled: 1,
                    is_publish: 0
                },
                categories: {!! $categories !!},
                errors: {},
                errorOccurred: false
            },

            computed: {
                rawContent: function() {
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
                    this.article.raw_content = this.rawContent;
                    let that = this;
                    axios.post('/article', this.article).then(function (resp) {
                        console.log(resp);
                        //if (resp.data)
                    }).catch(function (error) {
                        if(error.response.status == 422) {
                            that.errorOccurred = true;
                            that.errors = error.response.data;
                        }
                    });
                },

                preview: function () {

                }
            }

        });
    </script>


@endsection