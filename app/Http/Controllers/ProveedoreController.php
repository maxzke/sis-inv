<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ProveedoreController extends Controller
{
    public function create(){
        return Inertia::render('Proveedores/Create');
    }
}
