<?php

namespace App;

use HttpOz\Roles\Traits\HasRole;
use HttpOz\Roles\Contracts\HasRole as HasRoleContract;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements HasRoleContract 
{
    use Notifiable, HasRole, SoftDeletes, \Venturecraft\Revisionable\RevisionableTrait;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['created_at', 'deleted_at', 'updated_at', 'remember_token'];

    public $phones;

    protected $revisionCreationsEnabled = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function phones() {
        $phones = implode(', ', array_filter([$this->phone1, $this->phone2, $this->phone3]));
        return $phones;
    }

    public function fullName() 
    {
        return $this->name . " " . $this->lastname;
    }

    /**
     * Assigned agent
     */
    public function assignedAgent()
    {
        return $this->hasMany('App\User', 'assigned_agent_id');
    }

    /**
     * Assigned agent
     */
    public function assignedBuyers()
    {
        return $this->belongsTo('App\User', 'assigned_agent_id');
    }
        
}
