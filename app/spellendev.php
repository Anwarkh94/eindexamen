<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class spellendev extends Model
{
    protected $table = 'spellendev';

    protected $fillable = [
        'id', 
        'naam',
        'categorieen_id',
        'leeftijd',
        'beschrijving',
        'foto',
        'iframe',

    ];

    public function Category()
    {
        return $this->belongsTo(categorieen::class, 'categorieen_id', 'id');
    }
}
