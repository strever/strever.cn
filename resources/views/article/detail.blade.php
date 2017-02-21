@extends('common.app')

@section('head')
    <meta name="keywords" content="{{ $article->tags }}" />
    <meta name="description" content="{{ $article->subtitle }}" />
    <meta name="author" content="{{ $article->author }}" />

    <!-- Custom styles for this template -->
    <link href="{{ elixir('css/article.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="/css/github-markdown.css">

@endsection


@section('container')

    <div id="vue">
        <h1 class="text-center">{{ $article->title }}</h1>

        @include('partials.article')

        @include('partials.sidebar.baidu')

    </div>


@endsection

@section('js')

    <script>
        var vue = new Vue({

            el: '#vue',

            data: {
                article: {!! $article !!}
            },

            methods: {

            }

        });
    </script>


@endsection