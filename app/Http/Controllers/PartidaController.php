<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class PartidaController extends Controller
{
    

    public function index(){
        $param = Request::get('search');
        $param = ($param == NULL) ? ($param = '') : $param;
        $responseSearch = Partida::where('codigo', 'like','%'.$param.'%')
                    ->orWhere('nombre', 'like', '%'.$param.'%')
                    ->orderBy('nombre', 'asc')
                    ->paginate(15);
        return Inertia::render('Partidas/Index',[
            'partidas' => $responseSearch
            ]);
    }

    public function create(){
        return Inertia::render('Partidas/Create');
    }

    public function store(){

        Request::validate(
            [            
                'name' => ['required', Rule::unique('users')],
                'email' => ['required',Rule::unique('users'),'email'],
                'password' => ['min:8']
            ],
            [
                'name.required' => 'El nombre es requerido.',
                'name.unique' => 'El nombre ya se encuentra registrado.',
                'email.required' => 'El correo es requerido',
                'email.unique' => 'El correo ya se encuentra registrado.',
                'email.email' => 'Correo: Formato no válido.',
                'password.min' => 'La contraseña debe contener almenos 8 caracteres.'
            ]
        );

        $partida = new Partida();
        $partida->codigo = Request::get('codigo');
        $partida->nombre = Request::get('nombre');
        $partida->detalle = Request::get('detalle');
        $partida->save();
        return Redirect::back()->with('success', 'User updated.');
       
    }





}
