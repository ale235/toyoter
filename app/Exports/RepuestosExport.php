<?php

namespace App\Exports;

use App\Repuesto;
use Maatwebsite\Excel\Concerns\FromCollection;

class RepuestosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Repuesto::all();
    }
}
