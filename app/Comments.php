<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comments
 * @package App
 */
class Comments extends Model
{
    /**
     * Mass-assign fields
     *
     * @var array
     */
    protected $fillable = ['user_id', 'comment'];

    /**
     * User relation.
     * ----
     * Get the data from who created the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
