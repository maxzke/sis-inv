<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class PartidaController extends Controller
{
    public function search(){

        $param = Request::get('paramSearch');        

        //if = NULL asigna vacio "", sino asigna su valor
        $param = ($param == NULL) ? ($param = '') : $param;
        $responseSearch = Partida::where('codigo', 'like','%'.$param.'%')
                    ->orWhere('nombre', 'like', '%'.$param.'%')
                    ->get();
        return $responseSearch;
    }

    public function index(){
        $partidas = DB::table('partidas')
                ->orderBy('codigo', 'asc')
                ->get();
        return Inertia::render('Partidas/Index',[
            'partidas' => Partida::paginate(5)
            ]);
    }
}
