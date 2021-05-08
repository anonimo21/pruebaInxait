<?php

namespace App\Exports;

use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClienteExportQuery implements FromQuery, WithHeadings
{
    /**
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return DB::table('clientes as c')
        ->join('departamentos as d', 'd.id', 'c.departamento_id')
        ->join('ciudades as cd', 'cd.id', 'c.ciudad_id')
        ->select('c.id', 'c.nombres', 'c.apellidos', 'c.cedula', 'd.nombre as departamento', 'cd.nombre as ciudad', 'c.celular', 'c.correo', 'c.terminos', 'c.created_at')
        ->orderBy('c.id');
        // return Cliente::query()
        // ->select('id', 'nombres', 'apellidos', 'cedula', 'departamento_id', 'ciudad_id', 'celular', 'correo', 'terminos', 'created_at');
    }

    public function headings(): array
    {
        return [
            'ID',
            'NOMBRES',
            'APELLIDOS',
            'CEDULA',
            'DEPARTAMENTO',
            'CIUDAD',
            'CELULAR',
            'CORREO',
            'TERMINOS',
            'FECHA_CREACION'
        ];
    }
}
