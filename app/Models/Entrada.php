<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    public function proveedore(){
        return $this->belongsTo(Proveedore::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function activo(){
        return $this->hasMany(Activo::class);
    }

}
