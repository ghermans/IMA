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
    protected $fillable = ['name', 'description', 'application_id'];

    /**
     * Hidden fields
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Application relation
     * ----
     * Get the application name for the specific permission.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function application()
    {
        return $this->belongsTo('App\PermsApplication', 'application_id', 'id');
    }
}
