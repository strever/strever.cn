<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <span class="navbar-brand">
                    live and learn.
            </span>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">


            <ul class="nav navbar-nav navbar-right">
                @if(Route::currentRouteName() == 'article.detail')
                    <li><a href="{{ route('article.create', ['slug' => $article->slug]) }}">管理</a></li>
                @else
                    <li><a href="{{ route('article.create') }}">管理</a></li>
                @endif
            </ul>

            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="关键词">
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
            </form>

        </div>
    </div>
</nav>