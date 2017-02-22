<div class="blog-post">
    <h2 class="blog-post-title"> @{{ article.title ? article.title : '这是标题' }}</h2>
    <p>@{{ article.subtitle ? article.subtitle : '这是副标题' }}</p>

    <p class="blog-post-meta"><a href="weibo.com/strever" target="_blank">@{{ article.author }}</a> 发表于 @{{ article.created_at }}</p>
    <hr>

    <div class="markdown-body">
        <p v-html="rawContent"></p>
    </div>


</div><!-- /.blog-post -->