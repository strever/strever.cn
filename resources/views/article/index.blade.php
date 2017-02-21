@extends('common.app')

@section('head')
    <!-- Custom styles for this template -->
    <link href="{{ elixir('css/article.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="/css/github-markdown.css">

@endsection


@section('body')

    @include('partials.header')

@endsection


@section('container')

    {{--<div class="blog-header">
        <h1 class="blog-title">Strever's Blog</h1>
        <p class="lead blog-description">Can't stop revolution， in case 四十五来徒悲伤:smile:</p>
    </div>--}}

    <div class="blog-header">

    </div>

    <div class="breadcrumb col-lg-12">
        <p>live and learn.</p>
    </div>



    <div class="row">

        <div id="vue">
            <div class="col-lg-8 blog-main">


                <div class="blog-post" v-for="article in articles">

                    @include('partials.article')

                </div><!-- /.blog-post -->

                <nav>
                    <ul class="pager">
                        <li><a href="#">上一页</a></li>
                        <li><a href="#">下一页</a></li>
                    </ul>
                </nav>

            </div><!-- /.blog-main -->
        </div>

        @include('partials.sidebar')

    </div><!-- /.row -->


    @include('partials.footer')




@endsection


@section('js')

    <script>
        var vue = new Vue({

            el: '#vue',

            data: {
                articles: {!! $articles !!}
            },

            methods: {}

        });
    </script>

@endsection