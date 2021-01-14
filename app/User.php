<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
  protected static function boot()
    {
        parent::boot();

        static::updating(function (User $user) {
            if (in_array('email', $user->getChanges())) {
                $user->email_verified_at = null;
                $user->sendEmailVerificationNotification();
            }
        });
    }
  public function admin()
  {
    return $this->belongsTo('App\Admin','administrateur_id');
  }
  public function eleve()
  {
    return $this->belongsTo('App\Eleve');
  }
  public function responsable()
  {
    return $this->hasOne('App\Responsable');
  }
  public function offres()
  {
    return $this->hasMany('App\Offre');
  }
  public function sujets()
  {
    return $this->hasMany('App\Sujet');
  }
  public function reponses()
  {
    return $this->hasMany('App\SujetReponse');
  }
  public function qreponses()
  {
    return $this->hasMany('App\QuestionnaireReponse');
  }
  public function conversation()
  {
    return $this->belongsToMany(Conversation::class);
  }
  public function sujet_reponses()
   {
       return $this->belongsToMany('App\SujetReponse');
   }


  use Notifiable;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'name', 'email', 'password','image_profil'
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
  * The attributes that should be cast to native types.
  *
  * @var array
  */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];
}
