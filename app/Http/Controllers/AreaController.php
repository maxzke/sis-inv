<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class AreaController extends Controller
{
    public function index(){
        $param = Request::get('search');
        $param = ($param == NULL) ? ($param = '') : $param;
        $responseSearch = Area::where('nombre', 'like','%'.$param.'%')
                    ->orderBy('nombre', 'asc')
                    ->paginate(15);
        return Inertia::render('Areas/Index',[
            'areas' => $responseSearch
            ]);
    }

    public function create(){
        return Inertia::render('Areas/Create');
    }

    public function store(){

        Request::validate(
            [            
                'nombre' => ['required', Rule::unique('areas')]
            ],
            [
                'nombre.required' => 'El nombre es requerido',
                'nombre.unique' => 'El nombre ya se encuentra registrado'
            ]
        );

        $area = new Area();
        $area->nombre = Request::get('nombre');
        $area->save();
        return Redirect::back()->with('success', 'area updated.');
       
    }

    public function edit(Area $area){
        return Inertia::render('Areas/Edit',[
            'area' => [
                'id' => $area->id,
                'nombre' => $area->nombre
            ]
        ]);
    }

    
    public function update(Area $area){
        
        Request::validate(
                [            
                    'nombre' => ['required', Rule::unique('areas')->ignore($area->id)]
                ],
                [                    
                    'nombre.required' => 'El nombre es requerido',
                    'nombre.unique' => 'El nombre ya se encuentra registrado.'
                ]
            );
            
        $area->update(
            ['nombre' => Request::get('nombre')]
        );

        return Redirect::back()->with('success', 'area updated.');
    }


}
