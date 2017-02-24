<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon" href=" {{ url('/images/favicon.png') }}">

    <title>@if(isset($title)) {{ $title }} @else 践·言 - strever的博客 @endif</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="{{ mix('js/app.js') }}"></script>


    @yield('head')





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