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
                'codigo' => ['required', Rule::unique('partidas')],
                'nombre' => ['required',Rule::unique('partidas')]
            ],
            [
                'codigo.required' => 'El codigo es requerido.',
                'codigo.unique' => 'El codigo ya se encuentra registrado.',
                'nombre.required' => 'El nombre es requerido',
                'nombre.unique' => 'El nombre ya se encuentra registrado.'
            ]
        );

        $partida = new Partida();
        $partida->codigo = Request::get('codigo');
        $partida->nombre = Request::get('nombre');
        $partida->detalle = Request::get('detalle');
        $partida->save();
        return Redirect::back()->with('success', 'User updated.');
       
    }


    public function edit(Partida $partida){
        return Inertia::render('Partidas/Edit',[
            'partida' => [
                'id' => $partida->id,
                'codigo' => $partida->codigo,
                'nombre' => $partida->nombre,
                'detalle' => $partida->detalle,
            ]
        ]);
    }

    public function update(Partida $partida){
        $partida->update(
            Request::validate(
                [            
                    'codigo' => ['required',Rule::unique('partidas')->ignore($partida->id)],
                    'nombre' => ['required',Rule::unique('partidas')->ignore($partida->id)],
                    'detalle' => ['nullable']
                ],
                [
                    'codigo.required' => 'El codigo es requerido.',
                    'codigo.unique' => 'El codigo ya se encuentra registrado.',
                    'nombre.required' => 'El nombre es requerido',
                    'nombre.unique' => 'El nombre ya se encuentra registrado.'
                ]
            )
        );

        return Redirect::back()->with('success', 'Partida updated.');
    }





}
