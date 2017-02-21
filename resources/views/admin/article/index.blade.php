@extends('common.app')

@section('container')

    <div id="vue">
        <div>
            <example>

            </example>
        </div>

        <div class="list">
            <ul>
                <li v-for="article in articles">
                    @{{ article.title }}

                    <p>
                        于@{{ article.published_at }}发表
                    </p>

                    <hr style="border-style: dashed">

                    @{{ article.content }}

                    <hr><br/>
                </li>


            </ul>
        </div>
    </div>




@endsection


@section('js')

    <script>
        var vue = new Vue({

            el: '#vue',

            data: {
                articles: [
                    {
                        title: 'article title 1',
                        content: 'article 1 content #ggggggg',
                        created_at: 1472222222,
                        published_at: 1472222333,
                        author: 'strever'
                    },
                    {
                        title: 'article title 2',
                        content: 'article 2 content #ggggggg',
                        created_at: 1472222222,
                        published_at: 1472222333,
                        author: 'strever'
                    }
                ]
            },

            methods: {

            }

        });
    </script>


@endsection