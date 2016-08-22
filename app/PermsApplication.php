<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PermsApplication
 * @package App
 */
class PermsApplication extends Model
{
    /**
     * Mass-assign fields.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];
}
