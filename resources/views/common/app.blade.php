<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <meta name="description" content="strever's blog">
    <meta name="author" content="strever">

    <link rel="icon" type="image/x-icon" href=" {{ elixir('images/favicon.png') }}">

    <title>践·言 - strever的博客</title>

    <script src="{{ elixir('js/app.js') }}"></script>

    <link rel="stylesheet" href="{{ elixir('css/app.css') }}"/>

    <!-- Custom styles for this template -->
    <link href="{{ elixir('css/article.css') }}" rel="stylesheet">

    @yield('head')

</head>

<body>

<div class="container">

    @yield('content')

</div>

@yield('footer')


<script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
    ]); ?>
</script>
@yield('js')

</body>
</html>