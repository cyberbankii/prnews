<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function groups() {
        return $this->belongsToMany('App\Group');
    }

    public function hasGroup($groupId) {
        $groups = $this->groups()->getResults();
        foreach ($groups as $group) {
            if($group->id == $groupId) {
                return true;
            }
        }
        return false;
    }
}
