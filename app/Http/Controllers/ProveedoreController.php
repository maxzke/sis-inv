<?php

namespace App\Http\Controllers;

use App\Models\Proveedore;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;


class ProveedoreController extends Controller
{
    public function index(){
        $param = Request::get('search');
        $param = ($param == NULL) ? ($param = '') : $param;
        $responseSearch = Proveedore::where('codigo', 'like','%'.$param.'%')
                    ->orWhere('nombre', 'like', '%'.$param.'%')
                    ->orWhere('rfc', 'like', '%'.$param.'%')
                    ->orderBy('nombre', 'asc')
                    ->paginate(15);
        return Inertia::render('Proveedores/Index',[
            'proveedores' => $responseSearch
            ]);
    }

    public function create(){
        return Inertia::render('Proveedores/Create');
    }

    public function store(){

        Request::validate(
            [            
                'codigo' => ['required', Rule::unique('proveedores')],
                'nombre' => ['required', Rule::unique('proveedores')],
                'rfc'    => ['required', Rule::unique('proveedores')],
                'ciudad' => ['required'],
                'estado' => ['required']
            ],
            [
                'codigo.required' => 'El codigo es requerido',
                'codigo.unique' => 'El codigo ya se encuentra registrado',
                'nombre.required' => 'El nombre es requerido',
                'nombre.unique' => 'El nombre ya se encuentra registrado',
                'rfc.required' => 'El rfc es requerido',
                'rfc.unique' => 'El rfc ya se encuentra registrado',
                'ciudad.required' => 'La ciudad es requerida',
                'estado.required' => 'El estado es requerido',
            ]
        );

        $proveedor = new Proveedore();
        $proveedor->codigo = Request::get('codigo');
        $proveedor->nombre = Request::get('nombre');
        $proveedor->rfc = Request::get('rfc');
        $proveedor->telefono = Request::get('telefono');
        $proveedor->ciudad = Request::get('ciudad');
        $proveedor->estado = Request::get('estado');
        $proveedor->cp = Request::get('cp');
        $proveedor->calle = Request::get('calle');
        $proveedor->colonia = Request::get('colonia');
        $proveedor->giro = Request::get('giro');
        $proveedor->save();
        return Redirect::back()->with('success', 'User updated.');
       
    }

    public function edit(Proveedore $proveedor){
        return Inertia::render('Proveedores/Edit',[
            'proveedor' => [
                'id' => $proveedor->id,
                'codigo' => $proveedor->codigo,
                'nombre' => $proveedor->nombre,
                'rfc' => $proveedor->rfc,
                'telefono' => $proveedor->telefono,
                'ciudad' => $proveedor->ciudad,
                'estado' => $proveedor->estado,
                'cp' => $proveedor->cp,
                'calle' => $proveedor->calle,
                'colonia' => $proveedor->colonia,
                'giro' => $proveedor->giro,
            ]
        ]);
    }

    
    public function update(Proveedore $proveedor){
        
        Request::validate(
                [            
                    'codigo' => ['required', Rule::unique('proveedores')->ignore($proveedor->id)],
                    'nombre' => ['required', Rule::unique('proveedores')->ignore($proveedor->id)],
                    'rfc'    => ['required', Rule::unique('proveedores')->ignore($proveedor->id)],
                    'telefono' => ['nullable'],
                    'ciudad' => ['required'],
                    'estado' => ['required'],
                    'cp' => ['nullable'],
                    'calle' => ['nullable'],
                    'colonia' => ['nullable'],
                    'giro' => ['nullable'],
                ],
                [
                    'codigo.required' => 'El codigo es requerido.',
                    'codigo.unique' => 'El codigo ya se encuentra registrado.',
                    'nombre.required' => 'El nombre es requerido',
                    'nombre.unique' => 'El nombre ya se encuentra registrado.',
                    'rfc.required' => 'El rfc es requerido',
                    'rfc.unique' => 'El rfc ya se encuentra registrado',
                ]
            );
            
        $proveedor->update(
            ['codigo' => Request::get('codigo')],
            ['nombre' => Request::get('nombre')],
            ['rfc' => Request::get('rfc')],
            ['telefono' => Request::get('telefono')],
        );

        return Redirect::back()->with('success', 'proveedor updated.');
    }


}
