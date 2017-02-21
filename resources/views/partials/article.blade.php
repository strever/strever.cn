<div class="blog-post">
    <h2 class="blog-post-title"><a :href="'/article/slug/' + article.slug">@{{ article.title }}</a></h2>
    <p>@{{ article.subtitle }}</p>

    <p class="blog-post-meta">@{{ article.published_at }} by <a href="weibo.com/strever" target="_blank">@{{ article.author }}</a></p>
    <hr>

    <div class="markdown-body">
        <p v-html="article.raw_content"></p>
    </div>

</div><!-- /.blog-post -->