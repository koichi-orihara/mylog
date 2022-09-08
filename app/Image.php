<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Image extends Model
{
    protected $fillable = [
    'name',
    'path',
  ];
  
  public function users()
    {
        return $this->hasMany('App\User');
    }
}
