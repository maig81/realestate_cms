<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
	use SoftDeletes, \Venturecraft\Revisionable\RevisionableTrait;

    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];
    protected $revisionCreationsEnabled = true;

	/**
     * Street
     */
    public function street()
    {
        return $this->belongsTo('App\Street');
    }

    public function streetName() 
    {
    	return $this->street()->name;
    }

    public function municipalityName()
    {
    	return $this->street()->municipality()->name;
    }

    public function city()
    {
    	return $this->street()->municipality()->city();
    }
}
