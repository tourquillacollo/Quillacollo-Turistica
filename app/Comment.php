<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 1/20/19
 * Time: 2:55 PM
 */

namespace TUSIMO;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content', 'parent_id', 'lugares_id', 'user_id', 'like', 'rate'
    ];

    public function lugares()
    {
        return $this->belongsTo('TUSIMO\Lugares');
    }

    public function user()
    {
        return $this->belongsTo('TUSIMO\User');
    }

    public function parent()
    {
        return $this->belongsTo('TUSIMO\Comment', 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany('TUSIMO\Comment', 'parent_id');
    }

}