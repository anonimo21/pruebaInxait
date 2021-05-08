<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cliente;
use App\Models\Ganador;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ClienteIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
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

        $clientes = DB::table('clientes as c')
            ->join('departamentos as d', 'd.id', 'c.departamento_id')
            ->join('ciudades as cd', 'cd.id', 'c.ciudad_id')
            ->select('c.nombres', 'c.apellidos', 'c.cedula', 'd.nombre as departamento', 'cd.nombre as ciudad', 'c.celular', 'c.correo', 'c.terminos', 'c.created_at')
            ->where('c.nombres', 'LIKE', '%' . $this->search . '%')
            ->orderBy('c.id', 'desc')
            ->paginate(5);

        return view('livewire.admin.cliente-index', compact('clientes', 'champion'));
    }
}
