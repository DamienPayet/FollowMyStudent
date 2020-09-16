<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    public function offre()
    {
        return $this->belongsTo('App\Offre');
    }
    protected $fillable = [
        'titre', 'description', 'niveau',
    ];
}
