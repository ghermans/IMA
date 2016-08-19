<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    /**
     * Database table.
     *
     * @var string
     */
    protected $table = 'Application_Permissions';

    /**
     * Mass-assign fields
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * Hidden fields
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];
}
