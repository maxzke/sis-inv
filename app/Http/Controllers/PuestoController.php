<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class PuestoController extends Controller
{
    public function index(){
        $param = Request::get('search');
        $param = ($param == NULL) ? ($param = '') : $param;
        $responseSearch = Puesto::where('nombre', 'like','%'.$param.'%')
                    ->orderBy('nombre', 'asc')
                    ->paginate(15);
        return Inertia::render('Puestos/Index',[
            'puestos' => $responseSearch
            ]);
    }

    public function create(){
        return Inertia::render('Puestos/Create');
    }

    public function store(){

        Request::validate(
            [            
                'nombre' => ['required', Rule::unique('puestos')]
            ],
            [
                'nombre.required' => 'El nombre es requerido',
                'nombre.unique' => 'El nombre ya se encuentra registrado'
            ]
        );

        $puesto = new Puesto();
        $puesto->nombre = Request::get('nombre');
        $puesto->save();
        return Redirect::back()->with('success', 'puesto updated.');
       
    }

    public function edit(Puesto $puesto){
        return Inertia::render('Puestos/Edit',[
            'puesto' => [
                'id' => $puesto->id,
                'nombre' => $puesto->nombre
            ]
        ]);
    }

    
    public function update(Puesto $puesto){
        
        Request::validate(
                [            
                    'nombre' => ['required', Rule::unique('puestos')->ignore($puesto->id)]
                ],
                [                    
                    'nombre.required' => 'El nombre es requerido',
                    'nombre.unique' => 'El nombre ya se encuentra registrado.'
                ]
            );
            
        $puesto->update(
            ['nombre' => Request::get('nombre')]
        );

        return Redirect::back()->with('success', 'puesto updated.');
    }


}
