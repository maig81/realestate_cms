<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
	use SoftDeletes, \Venturecraft\Revisionable\RevisionableTrait;
    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];

    /**
     * Municipality
     */
    public function municipality()
    {
        return $this->belongsTo('App\Municipality');
    }

	/**
     * Street
     */
    public function street()
    {
        return $this->hasMany('App\Street');
    }
}
