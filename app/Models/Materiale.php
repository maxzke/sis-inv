<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiale extends Model
{
    use HasFactory;

    public function partida(){
        return $this->belongsTo(Partida::class);
    }

    public function activo(){
        return $this->hasMany(Activo::class);
    }
}
