<?php

namespace App\Exports;

use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClienteExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Cliente::all();
    }

    public function headings(): array {
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
            'FECHA_CREACION',
            'FECHA_ACTUALIZACION'
        ];
    }
}
