<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

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
    public function slugIsExists($slug)
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
}
