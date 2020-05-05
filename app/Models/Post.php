<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'user_id',
    ];

   public function user()
   {
       return $this->belongsTo('App\User','user_id');
   }
   public function comments()
   {
       return $this->hasMany('App\Models\Comment');
   }

}
