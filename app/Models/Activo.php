<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    use HasFactory;

    public function materiale(){
        return $this->belongsTo(Materiale::class);
    }

    public function entrada(){
        return $this->belongsTo(Entrada::class);
    }

    public function resguardo(){
        return $this->hasMany(Resguardo::class);
    }

}
