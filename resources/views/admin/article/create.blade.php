@extends('common.app')

@section('head')
    <style>

        .edit-area {
            float: left;
            border: 2px;
            border-style: dashed;
            width: 40%;
        }

        .preview-area {
            float: right;
            border: 2px;
            border-style: dashed;
            width: 40%;
        }

        .dashed {
            border-style: dashed;
        }
    </style>

@endsection

@section('content')

    <div id="vue">

        <div class="edit-area">
            <div class="form">

                    <div class="form-group">
                        title: <input type="text" name="title" v-model="article.title" />
                    </div>

                    <div class="form-group">
                        content: <textarea type="text" name="content" v-model="article.content" ></textarea>
                    </div>

                    <div class="form-group">
                        <button v-on:click="createArticle">提交</button>
                    </div>

            </div>
        </div>


        <div class="preview-area">
            [[ article.title ]]

            <hr class="dashed">

            [[ article.content ]]
        </div>

    </div>




@endsection


@section('js')

    <script>
        var vue = new Vue({

            delimiters: ['[[', ']]'],

            el: '#vue',

            data: {
                article: {
                    title: 'article title 1',
                    content: 'article 1 content #ggggggg',
                    created_at: 1472222222,
                    published_at: 1472222333,
                    author: 'strever'
                }
            },

            methods: {
                createArticle: function() {
                    axios.post('/article/store', this.article).then(function(resp) {
                        console.log(resp);
                    }, function(resp) {
                        console.log(resp);
                    });
                },

                preview: function() {

                }
            }

        });
    </script>


@endsection