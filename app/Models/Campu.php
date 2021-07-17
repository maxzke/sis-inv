<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campu extends Model
{
    use HasFactory;

    public function resguardo(){
        return $this->hasMany(Resguardo::class);
    }

    public function empleado(){
        return $this->hasMany(Empleado::class);
    }

}
