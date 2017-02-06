<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>strever</title>

    <link rel="stylesheet" href="{{ elixir('css/app.css') }}" />

    @yield('head')

</head>

<body>

    @yield('content')

    <script src="{{ elixir('js/app.js') }}"></script>
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    @yield('js')

</body>
</html>