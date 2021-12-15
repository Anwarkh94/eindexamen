<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorieen extends Model
{
    protected $table = 'categorieen';

    protected $fillable = [
        'naam', 
        'id', 
    ];
}
