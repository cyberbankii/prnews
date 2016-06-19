<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['path'];

    public function news() {
    	return $this->belongsTo('App\News');
    }
}
