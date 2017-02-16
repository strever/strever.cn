<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>strever</title>

    <link rel="icon" type="image/x-icon" href=" {{ elixir('images/favicon.png') }}">

    {{--<link rel="stylesheet" href="{{ elixir('css/app.css') }}" />--}}
<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    @yield('head')

</head>

<body>

    <div class="container">
        @yield('content')
    </div>


    @yield('footer')

    {{--<script src="{{ elixir('js/app.js') }}"></script>--}}
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    @yield('js')

</body>
</html>