<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacione extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre'
    ];

    public function resguardo(){
        return $this->hasMany(Resguardo::class);
    }
    
}
