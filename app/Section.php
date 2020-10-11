<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function section()
    {
        return $this->belongsTo('App\Section');
    }
    protected $fillable = [
        'titre', 'description',
    ];
}
