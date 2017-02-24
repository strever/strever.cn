@extends('common.app')

@section('head')
    <meta name="description" content="strever's blog">
    <meta name="author" content="strever">

    <!-- Custom styles for this template -->
    <link href="{{ url('/css/article.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/vendor/github-markdown.css') }}">

@endsection


@section('body')

    @include('partials.header')
    @include('partials.breadcrumb')

@endsection


@section('container')

    {{--<div class="blog-header">
        <h1 class="blog-title">Strever's Blog</h1>
        <p class="lead blog-description">Can't stop revolution</p>
    </div>--}}



    <div class="row">

        <div id="vue">
            <div class="col-lg-8 blog-main">

                @if(!$articles->isEmpty())
                    <div class="blog-post">


                        @foreach($articles as $article)

                            @include('partials.article')

                            <hr/>
                        @endforeach


                    </div><!-- /.blog-post -->

                    {{ $articles->links() }}

                @else
                    <p>没有数据</p>
                @endif

            </div><!-- /.blog-main -->
        </div>

        @include('partials.sidebar')

    </div><!-- /.row -->


    @include('partials.footer')

@endsection