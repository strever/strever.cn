<div class="blog-post">
    <h2 class="blog-post-title"><a href="{{ route('article.detail', ['slug' => $article->slug]) }}">{{ $article->title }}</a></h2>
    <p>{{ $article->subtitle }}</p>

    <p class="blog-post-meta"><a href="weibo.com/strever" target="_blank">{{ $article->author }}</a> 发表于 {{ $article->published_at }}</p>
    <hr>

    <div class="markdown-body">
        {!! $article->raw_content !!}
    </div>

</div><!-- /.blog-post -->