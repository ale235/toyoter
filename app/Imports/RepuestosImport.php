<?php

namespace App\Imports;

use App\Repuesto;
use Maatwebsite\Excel\Concerns\ToModel;

class RepuestosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Repuesto([
            //
        ]);
    }
}
