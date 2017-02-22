<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Comment
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $article_id
 * @property string $email
 * @property int $ip
 * @property string $userid
 * @property string $content
 * @property string $type
 * @property int $parent_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereArticleId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereIp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereUserid($value)
 * @property string $user_id
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereUserId($value)
 */
class Comment extends Model
{
    //
}
