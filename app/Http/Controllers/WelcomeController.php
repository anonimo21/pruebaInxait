<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Ganador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $cli = Cliente::all();
        $contadorcli = 0;
        foreach ($cli as $cl) {
            $contadorcli = $contadorcli + 1;
        }

        $gan = Ganador::all();
        $contadorgan = 0;
        foreach ($gan as $gn) {
            $contadorgan = $contadorgan + 1;
        }
        //dd($contadorgan);

        if ($contadorcli > 5 && $contadorgan < 1) {
            $idganador = rand(0, $contadorcli);
            $clienteGanador = Cliente::find($idganador);
            //dd($clienteGanador->id);
            //Ganador::where('cliente_id', $clienteGanador->id)->delete();
            $ganador = new Ganador();
            $ganador->cliente_id = $clienteGanador->id;
            $ganador->save();
        }

        $champion = DB::table('ganadores as g')
            ->join('clientes as c', 'c.id', 'g.cliente_id')
            ->select('g.id', 'c.cedula', 'c.nombres', 'c.apellidos')
            ->orderBy('g.id', 'desc')
            ->first();
            
        $departamentos = DB::table('departamentos')->pluck('nombre', 'id');
        return view('welcome', compact('departamentos', 'champion'));
    }
}
