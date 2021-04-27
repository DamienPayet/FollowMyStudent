<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SujetReponse extends Model
{
  public function sujet()
  {
    return $this->belongsTo('App\Sujet');
  }
  public function user()
  {
    return $this->belongsTo('App\User');
  }
  public function likes()
  {
    return $this->hasMany('App\Like');
  }
  public function isLikedByLoggedInUser()
  {
    return $this->likes->where('user_id', auth()->user()->id)->isEmpty() ? false : true;
  }
}
