<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable=[
      'name',
      'lastname',
      'username',
    ];

  function post(){
    return $this->hasMany(Post::class);
  }

}
