<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aboutContent = <<<ABOUT
        
## 联系方式

- 微博： [@strever](http://weibo.com/strever)

- QQ: **164984514**

- email: **<strever@qq.com>**
ABOUT;

        $categories = \App\Category::categories(false);
        $categoriesContent = '';
        foreach($categories as $category)
        {
            $categoriesContent .= "[{$category['name']}](" . route('category', ['slug' => $category['slug']]) . ')' . PHP_EOL . PHP_EOL;
        }

        $resumeContent = <<<RESUME
# 工作经历

# 技能清单

RESUME;

        $dateTime = \Carbon\Carbon::now()->toDateTimeString();

        $markdownParser = new \cebe\markdown\GithubMarkdown();
        \App\Article::insert([
            'title' => 'about',
            'subtitle' => '关于',
            'author' => 'strever',
            'slug' => 'about',
            'article_type' => 8,
            'category_id' => 9,
            'markdown_content' => $aboutContent,
            'raw_content' => $markdownParser->parse($aboutContent),
            'comment_enabled' => 1,
            'is_publish' => 1,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
            'published_at' => $dateTime
        ]);

        \App\Article::insert([
            'title' => 'resume',
            'subtitle' => '简历',
            'author' => 'strever',
            'slug' => 'resume',
            'article_type' => 8,
            'category_id' => 10,
            'markdown_content' => $resumeContent,
            'raw_content' => $markdownParser->parse($resumeContent),
            'comment_enabled' => 10,
            'is_publish' => 1,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
            'published_at' => $dateTime,
        ]);

        \App\Article::insert([
            'title' => 'categories',
            'subtitle' => '文章分类',
            'author' => 'strever',
            'slug' => 'categories',
            'article_type' => 8,
            'category_id' => 10,
            'markdown_content' => $categoriesContent,
            'raw_content' => $markdownParser->parse($categoriesContent),
            'comment_enabled' => 1,
            'is_publish' => 1,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
            'published_at' => $dateTime,
        ]);

        \App\Article::addSlug('about');
        \App\Article::addSlug('resume');
        \App\Article::addSlug('categories');

    }
}
