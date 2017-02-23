<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Overtrue\LaravelPinyin\Facades\Pinyin;

/**
 * App\Article
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $sub_title
 * @property bool $cate_id
 * @property string $content
 * @property int $comment_count
 * @property int $visited_count
 * @property bool $comment_enabled
 * @property bool $is_show
 * @property string $tags
 * @property string $published_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereCateId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereCommentCount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereCommentEnabled($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereIsShow($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article wherePublishedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereSubTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereTags($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereVisitedCount($value)
 * @property string $subtitle
 * @property string $author
 * @property bool $article_type
 * @property bool $category_id
 * @property string $markdown_content
 * @property string $raw_content
 * @property bool $is_publish
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereArticleType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereAuthor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereIsPublish($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereMarkdownContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereRawContent($value)
 */
class Article extends Model
{
    private static $_articleTypes = [
        1 => '原创',
        2 => '转载',
        3 => '改编'
    ];

    const CACHE_KEY_ARTICLE_SLUGS = 'blog:article:slugs';


    public function slugs()
    {
        //$redis = Redis::connection('another');

        return Redis::connection()->smembers(self::CACHE_KEY_ARTICLE_SLUGS);
    }


    /**
     * @param $slug
     * @return int
     */
    public static function slugIsExists($slug)
    {
        if(empty($slug))
        {
            return 0;
        }

        return Redis::connection()->sismember(self::CACHE_KEY_ARTICLE_SLUGS, $slug);
    }

    public static function addSlug($slug)
    {
        if(empty($slug) || !is_scalar($slug))
        {
            return 0;
        }

        return Redis::connection()->sadd(self::CACHE_KEY_ARTICLE_SLUGS, $slug);
    }

    public static function generateSlug($title)
    {
        if(empty($title))
        {
            return '';
        }

        return Str::slug(Pinyin::permalink($title));
    }

    public function saveArticle($article)
    {
        $this->title = $article['title'];
        $this->subtitle = $article['subtitle'];
        $this->author = 'strever';
        $this->slug = self::generateSlug($article['title']);
        $this->article_type = intval($article['article_type']);
        $this->category_id = intval($article['category_id']);
        $this->markdown_content = $article['markdown_content'];
        $this->raw_content = $article['raw_content'];
        $this->comment_enabled = $article['comment_enabled'];
        $this->is_publish = $article['is_publish'];

        $article['is_publish'] and $this->published_at = Carbon::now()->toDateTimeString();

        $saved = $this->save();
        if($saved)
        {
            self::addSlug($this->slug);
            return $this;
        }

        return false;
    }

    public static function articleTypes()
    {
        return self::$_articleTypes;
    }

}
