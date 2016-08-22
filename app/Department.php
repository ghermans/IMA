<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Department
 * @package App
 */
class Department extends Model
{
    /**
     * Mass assign fields.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * Department manager relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function managers()
    {
        return $this->belongsToMany('App/User');
    }
}
