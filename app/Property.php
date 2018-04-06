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

    protected $appends = ['locationName'];


    public function getLocationNameAttribute()
    {
        return $this->location->name;
    }

    public function street()
    {
        return $this->belongsTo('App\Street');
    }

    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    public function cityName()
    {
        if (isset($this->street_id)) {
            if (isset($this->street()->municipality_id)) {
                if (isset($this->street()->municipality()->city_id)) {
                    return $this->street()->municipality()->city()->name;
                }
            }
        }
    	return null;
    }


    public function streetName() 
    {
        return $this->street->name;
    }

    public function municipalityName()
    {
        return $this->street()->municipality()->name;
    }
    

}
