<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $fillable = ['nom','prenom', 'email', 'telephone', 'sujet', 'message'];
}
