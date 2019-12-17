<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
      protected $fillable = [
        'post_id',
        'user_id',
        'body',
    ];
     public function post()
    {
        return $this->belongsTo('App\Post','post_id');
    }
     public function info()
    {
        return $this->belongsTo('App\Comment','user_id');
    }
}
