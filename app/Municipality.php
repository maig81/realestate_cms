<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Municipality extends Model
{
	use SoftDeletes, \Venturecraft\Revisionable\RevisionableTrait;
    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];

	/**
     * Streets
     */
    public function streets()
    {
        return $this->hasMany('App\Street');
    }

	/**
     * Properties
     */
    public function properties()
    {
        return $this->hasManyThrough('App\Street', 'App\Property');
    }

	/**
     * City
     */
    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
