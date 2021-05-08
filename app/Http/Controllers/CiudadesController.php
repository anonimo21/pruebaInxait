<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CiudadesController extends Controller
{
    public function index(Request $request){
        //dd($request->departamento);
        if (!$request->ajax()) {
            return redirect('/');
        }
        $ciudades = DB::table('ciudades')->where('departamento_id', $request->departamento)->pluck('nombre', 'id');
        //dd($ciudades);
        return $ciudades;
    }
}
