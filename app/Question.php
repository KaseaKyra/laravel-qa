<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Question extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'body'];

    /**
     * @return BelongsTo
     */
    function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    /**
     * @param $value
     * set slug base on title
     */
    function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
