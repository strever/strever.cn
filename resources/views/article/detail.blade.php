@extends('common.app')

@section('head')
    <meta name="keywords" content="{{ $article->tags }}" />
    <meta name="description" content="{{ $article->subtitle }}" />
    <meta name="author" content="{{ $article->author }}" />

    <!-- Custom styles for this template -->
    <link href="{{ elixir('css/article.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="/css/github-markdown.css">

@endsection

@section('body')

    @include('partials.header')

@endsection


@section('container')

    @include('partials.article')

    @include('partials.sidebar.baidu')


@endsection