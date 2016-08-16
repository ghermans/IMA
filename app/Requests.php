<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    /**
     * Mass-assign fields
     *
     * @var array
     */
    protected $fillable = ['status_id', 'user_id', 'requester_id', 'title', 'description'];

    /**
     * Hidden output fields.
     * 
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];
}
