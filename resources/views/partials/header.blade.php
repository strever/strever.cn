<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item active" href="/">首页</a>
            <a class="blog-nav-item" href="{{ route('article.detail', ['slug' => 'categories']) }}">分类</a>
            {{--<a class="blog-nav-item" href="{{ route('article', ['slug' => 'tag']) }}">标签</a>--}}
            <a class="blog-nav-item" href="{{ route('category', ['slug' => 'php']) }}">PHP</a>
            <a class="blog-nav-item" href="{{ route('article.detail', ['slug' => 'about']) }}">关于</a>
            <a class="blog-nav-item" href="{{ route('article.detail', ['slug' => 'resume']) }}">简历</a>
        </nav>
    </div>
</div>