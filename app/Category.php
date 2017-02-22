<?php

namespace App;

use Doctrine\Common\Cache\PredisCache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

/**
 * App\Category
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereSlug($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    const CACHE_KEY_ARTICLE_CATEGORIES = 'blog:article:categories';

    /**
     * @param bool $useCache
     * @return array
     */
    public static function categories($useCache = true)
    {
        $redis = Redis::connection();

        $cacheCategories = $redis->get(self::CACHE_KEY_ARTICLE_CATEGORIES);
        if($useCache && $cacheCategories)
        {
            return json_decode($cacheCategories, true);
        }

        $categories = self::get()->toArray();
        if($categories)
        {
            $redis->set(self::CACHE_KEY_ARTICLE_CATEGORIES, json_encode($categories));

            return $categories;
        }

        return [];
    }
}
