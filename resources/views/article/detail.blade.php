@extends('common.app')

@section('head')
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="aythor" content="" />
@endsection


@section('content')

    <div id="vue">
        <h1 class="text-center">{{ $article->title }}</h1>

        @include('partials.article')

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