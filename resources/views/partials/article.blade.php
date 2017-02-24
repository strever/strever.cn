<div class="blog-post">
    <h2 class="blog-post-title"><a href="{{ route('article.detail', ['slug' => $article->slug]) }}">{{ $article->title }}</a></h2>
    <p>{{ $article->subtitle }}</p>

    <p class="blog-post-meta">
        <a href="weibo.com/strever" target="_blank">{{ $article->author }}</a> 发表于 {{ $article->published_at }}

        &nbsp;&nbsp; <em><a href="{{ route('category', ['slug' => \App\Category::find($article->category_id)->slug]) }}">{{ \App\Article::categories()[$article->category_id] }}</a></em>
    </p>
    <hr>

    <div class="markdown-body">
        {!! $article->raw_content !!}
    </div>

</div><!-- /.blog-post -->