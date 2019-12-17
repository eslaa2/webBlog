<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'body',
        'isPublished',
    ];
     public function comment()
    {
        return $this->hasMany('App\Comment', 'post_id');
    }
    public function image()
    {
        return $this->hasMany('App\Image', 'post_id');
    }
      public function info()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
     public function cat()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
    
}
