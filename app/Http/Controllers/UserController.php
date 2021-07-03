<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class UserController extends Controller
{
    public function search(Request $request){

        $param = Request::get('paramBuscar');        

        //if = NULL asigna vacio "", sino asigna su valor
        $param = ($param == NULL) ? ($param = '') : $param;
        $users = User::where('name', 'like','%'.$param.'%')
                    ->orWhere('email', 'like', '%'.$param.'%')
                    ->get();
        return $users;
    }

    public function index(){
        return Inertia::render('Usuarios/Index',[
            'users' => User::all()
            ]);
        
    }

    public function user_view(Request $request){
        $idUser = $request->id;
        $usuario = User::find($idUser); 
        //return $request->all();
        $response = response()->json([
            'success'=>TRUE, 
            'user'=>$usuario
            ]);
        return Inertia::render('Usuarios/Show',['user' => $usuario]);
    }

    public function edit(User $user){
        return Inertia::render('Usuarios/Edit',[
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ]
        ]);
    }

    public function getById(Request $request){
        $idUser = $request->id;
        $usuario = User::find($idUser); 
        $response = response()->json([
            'success'=>TRUE, 
            'user'=>$usuario
            ]);
        return $response;
    }
    

    public function update(User $user){

        Request::validate(
            [            
                'name' => ['required',Rule::unique('users')->ignore($user->id)],
                'email' => ['required',Rule::unique('users')->ignore($user->id),'email'],
                'password' => ['nullable','min:8']
            ]   
        );

        $user->update(Request::only('name','email'));

        if (Request::get('password')) {
            $user->update(['password' => Hash::make(Request::get('password'))]);
        }
        //------------------------------
        return Redirect::back()->with('success', 'User updated.');
       
    }//End update

    public function create(){
        return Inertia::render('Usuarios/Create');
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

        $user = new User;
        $user->name = Request::get('name');
        $user->email = Request::get('email');
        $user->password = Hash::make(Request::get('password'));
        $user->save();
        return Redirect::back()->with('success', 'User updated.');
       
    }








}//End class
