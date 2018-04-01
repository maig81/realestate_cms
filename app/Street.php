<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Street extends Model
{
	use SoftDeletes, \Venturecraft\Revisionable\RevisionableTrait;

    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];
    protected $revisionCreationsEnabled = true;


	/**
     * Property
     */
    public function properties()
    {
        return $this->hasMany('App\Property');
    }

    /**
     * Municipality
     */
    public function municipality()
    {
        return $this->belongsTo('App\Municipality');
    }

}
