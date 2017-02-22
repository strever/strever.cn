<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item {{ ($slug == 'home') ? 'active' : '' }}" href="/">首页</a>
            <a class="blog-nav-item {{ ($slug == 'categories') ? 'active' : '' }}" href="{{ route('article.detail', ['slug' => 'categories']) }}">分类</a>
            {{--<a class="blog-nav-item" href="{{ route('article', ['slug' => 'tag']) }}">标签</a>--}}
            <a class="blog-nav-item {{ ($slug == 'php') ? 'active' : '' }}" href="{{ route('category', ['slug' => 'php']) }}">PHP</a>
            <a class="blog-nav-item {{ ($slug == 'about') ? 'active' : '' }}" href="{{ route('article.detail', ['slug' => 'about']) }}">关于</a>
            <a class="blog-nav-item {{ ($slug == 'resume') ? 'active' : '' }}" href="{{ route('article.detail', ['slug' => 'resume']) }}">简历</a>
        </nav>
    </div>
</div>