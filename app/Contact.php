<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $fillable = ['traite','nom','prenom', 'email', 'telephone', 'sujet', 'message'];
}
