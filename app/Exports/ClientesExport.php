<?php

namespace App\Exports;

use App\Cliente;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ClientesExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Cliente::join('users as u','user_id','=','u.id')
            ->select('razon_social','telefono','u.email','cuit','iva','provincia','localidad','calleynumero','codigopostal')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Razón Social',
            'Teléfono',
            'Mail',
            'Cuit',
            'IVA',
            'Provincia',
            'Localidad',
            'Calle y Número',
            'Código Postal',
        ];
    }
}
