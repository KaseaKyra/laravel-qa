<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
