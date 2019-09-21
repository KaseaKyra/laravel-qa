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
        return $this->belongsTo(User::class);
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

    /**
     * @return string
     */
    function getUrlAttribute()
    {
        return route('questions.show', $this->id);
    }

    /**
     * @return mixed
     */
    function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * @return string
     */
    function getStatusAttribute()
    {
        if ($this->answer > 0) {
            if ($this->best_answer_id) {
                return 'answered-accepted';
            }
            return 'answered';
        }
        return 'unanswered';
    }
}
