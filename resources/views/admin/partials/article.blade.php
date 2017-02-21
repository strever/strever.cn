<div class="blog-post">
    <h2 class="blog-post-title"> @{{ article.title ? article.title : '这是标题' }}</h2>
    <p>@{{ article.subtitle ? article.subtitle : '这是副标题' }}</p>

    <p class="blog-post-meta">@{{ article.created_at }} by <a href="weibo.com/strever" target="_blank">@{{ article.author }}</a></p>
    <hr>

    <div class="markdown-body">
        <p v-html="rawContent"></p>
    </div>


</div><!-- /.blog-post -->