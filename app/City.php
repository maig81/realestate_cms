<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
	use SoftDeletes, \Venturecraft\Revisionable\RevisionableTrait;

    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];
    protected $revisionCreationsEnabled = true;

	/**
     * Municipalities
     */
    public function municipalities()
    {
        return $this->hasMany('App\Municipality');
    }

}
