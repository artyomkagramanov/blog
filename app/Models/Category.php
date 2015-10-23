<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	 protected $fillable = array('name','user_id');
    //

	 public function posts()
    {
        return $this->belongsToMany('App\Models\Post','categoriestoposts');
    }
}
