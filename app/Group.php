<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name'];

    public function users() {
    	return $this->belongsToMany('App\User');
    }

    public function news() {
    	return $this->belongsToMany('App\News');
    }
}
