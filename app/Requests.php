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
    protected $fillable = ['status_id', 'user_id', 'permission_id', 'requester_id', 'title', 'description'];

    /**
     * Status for the request.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo('App\requestStatus', 'status_id', 'id');
    }

    /**
     * Created the request for employee.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    /**
     * Who create the request relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function requester()
    {
        return $this->belongsTo('App\User', 'requester_id', 'id');
    }


    /**
     * Permission request
     *
     * The requested permission relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permission()
    {
        return $this->belongsTo('App\Permissions', 'permission_id', 'id');
    }

    /**
     * Request comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function comments()
    {
       return $this->belongsToMany('App\Comments');
    }
}
