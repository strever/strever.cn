<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link rel="icon" type="image/x-icon" href=" {{ elixir('images/favicon.png') }}">

    <title>@if(isset($title)) {{ $title }} @else 践·言 - strever的博客 @endif</title>

    <script src="{{ elixir('js/app.js') }}"></script>

    @yield('head')

    <link rel="stylesheet" href="{{ elixir('css/app.css') }}"/>



</head>

<body>

@yield('body')

<div class="container">

    @yield('container')

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