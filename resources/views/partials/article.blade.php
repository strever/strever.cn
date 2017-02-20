<div class="blog-post">
    <h2 class="blog-post-title"> @{{ article.title }}</h2>
    <p class="blog-post-meta">@{{ article.created_at }} by <a href="#">@{{ article.author }}</a></p>

    <p>@{{ article.sub_title }}</p>
    <hr>

    <p>@{{ article.content }}</p>

    <div class="markdown-body">
        <p v-html="markedContent"></p>
    </div>


</div><!-- /.blog-post -->