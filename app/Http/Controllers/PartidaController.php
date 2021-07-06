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
                    ->paginate(5);
        //return $responseSearch;
        return Inertia::render('Partidas/Index',[
            'partidas' => $responseSearch
            ]);
    }

    public function index(){
        // $partidas = DB::table('partidas')
        //         ->orderBy('codigo', 'asc')
        //         ->get();
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
}
