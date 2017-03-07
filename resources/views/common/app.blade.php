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
<script src="{{ mix('js/app.js') }}"></script>
<script>

    if($('#gh_repos')) {
        var github = (function(){
            function escapeHtml(str) {
                return $('<div/>').text(str).html();
            }
            function render(target, repos){
                var i = 0, fragment = '', t = $(target)[0];

                for(i = 0; i < repos.length; i++) {
                    fragment += '<li><a href="'+repos[i].html_url+'">'+repos[i].name+'</a><p>'+escapeHtml(repos[i].description||'')+'</p></li>';
                }

                fragment += '<li><a href="https://github.com/strever" target="_blank">更多···</a></li>';
                t.innerHTML = fragment;
            }
            return {
                showRepos: function(options){
                    $.ajax({
                        url: "https://api.github.com/users/"+options.user+"/repos?sort=pushed&callback=?"
                        , dataType: 'jsonp'
                        , error: function (err) { $(options.target + ' li.loading').addClass('error').text("Error loading feed"); }
                        , success: function(data) {
                            var repos = [];
                            if (!data || !data.data) { return; }
                            for (var i = 0; i < data.data.length; i++) {
                                if (options.skip_forks && data.data[i].fork) { continue; }
                                repos.push(data.data[i]);
                            }
                            if (options.count) { repos.splice(options.count); }
                            render(options.target, repos);
                        }
                    });
                }
            };
        })();


        $(function(){
            github.showRepos({
                user: 'strever',
                count: 3,
                skip_forks: true,
                target: '#gh_repos'
            });
        });
    }

</script>

@yield('js')

</body>
</html>