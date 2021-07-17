<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resguardo extends Model
{
    use HasFactory;

    public function activo(){
        return $this->belongsTo(Activo::class);
    }
    public function ubicacione(){
        return $this->belongsTo(Ubicacione::class);
    }
    public function campu(){
        return $this->belongsTo(Campu::class);
    }
    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }


}
