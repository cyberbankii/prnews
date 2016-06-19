<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class News extends Model
{
    protected $fillable = ['title', 'body'];

    protected $dates = ['created_at', 'updated_at'];

    public function groups() {
    	return $this->belongsToMany('App\Group');
    }

    public function images() {
    	return $this->hasMany('App\Image');
    }

    public function setCreatedAtAttribute($date) {
    	$this->attributes['created_at'] = Carbon::parse($date)->subDay();
    }

    public function setUpdatedAtAttribute($date) {
    	$this->attributes['updated_at'] = Carbon::parse($date)->subDay();
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
