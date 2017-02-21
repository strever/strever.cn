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
 */
class Article extends Model
{

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

    public function addSlug($slug)
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

    public function createArticle($article)
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
        (isset($article['id']) && is_numeric($article['id']) && $article['id'] > 0) and $this->id = $article['id'];

        $articleId = $this->save();
        if($articleId)
        {
            $this->addSlug($this->slug);
        }

        return $articleId;
    }

}
