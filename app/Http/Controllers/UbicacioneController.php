<?php

namespace App\Http\Controllers;

use App\Models\Ubicacione;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class UbicacioneController extends Controller
{
    public function index(){
        $param = Request::get('search');
        $param = ($param == NULL) ? ($param = '') : $param;
        $responseSearch = Ubicacione::where('nombre', 'like','%'.$param.'%')
                    ->orderBy('nombre', 'asc')
                    ->paginate(15);
        return Inertia::render('Ubicaciones/Index',[
            'ubicaciones' => $responseSearch
            ]);
    }

    public function create(){
        return Inertia::render('Ubicaciones/Create');
    }

    public function store(){

        Request::validate(
            [            
                'nombre' => ['required', Rule::unique('ubicaciones')]
            ],
            [
                'nombre.required' => 'El nombre es requerido',
                'nombre.unique' => 'El nombre ya se encuentra registrado'
            ]
        );

        $ubicacion = new Ubicacione();
        $ubicacion->nombre = Request::get('nombre');
        $ubicacion->save();
        return Redirect::back()->with('success', 'puesto updated.');
       
    }

    public function edit(Ubicacione $ubicacion){
        return Inertia::render('Ubicaciones/Edit',[
            'ubicacion' => [
                'id' => $ubicacion->id,
                'nombre' => $ubicacion->nombre
            ]
        ]);
    }

    
    public function update(Ubicacione $ubicacion){
        
        Request::validate(
                [            
                    'nombre' => ['required', Rule::unique('ubicaciones')->ignore($ubicacion->id)]
                ],
                [                    
                    'nombre.required' => 'El nombre es requerido',
                    'nombre.unique' => 'El nombre ya se encuentra registrado.'
                ]
            );
            
        $ubicacion->update(
            ['nombre' => Request::get('nombre')]
        );

        return Redirect::back()->with('success', 'puesto updated.');
    }


}
