<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    public function resguardo(){
        return $this->hasMany(Resguardo::class);
    }

    public function campu(){
        return $this->belongsTo(Campu::class);
    }
    public function area(){
        return $this->belongsTo(Area::class);
    }
    public function puesto(){
        return $this->belongsTo(Puesto::class);
    }

}

