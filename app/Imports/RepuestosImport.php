<?php

namespace App\Imports;

use App\MarcaRepuesto;
use App\MarcaVehiculo;
use App\Precio;
use App\Repuesto;
use App\Seccion;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class RepuestosImport implements ToModel, WithProgressBar
{
    use Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        try
        {
            DB::beginTransaction();
            if(!($row[0] == "CODIGO")){
//            dd($row);
                set_time_limit(0);
                //dd($row);
                $marca_repuesto = new MarcaRepuesto([
                    'nombre' => $row[3],
                ]);
                $marca_repuesto->save();

                $marca_vehiculo = new MarcaVehiculo([
                    'nombre' => $row[4],
                ]);
                $marca_vehiculo->save();

                $seccion = new Seccion([
                    'nombre' => $row[5],
                ]);
                $seccion->save();

                $precio = new Precio([
                    'precio_sugerido' => $row[6],
                    'precio_minorista' => $row[6],
                    'precio_mayorista' => $row[6],
                    'precio_personalizado' => $row[6],
                ]);
                $precio->save();

                return new Repuesto([
                    'codigo' => $row[0],
                    'descripcion' => $row[1],
                    'marca_repuesto_id' => $marca_repuesto->id,
                    'marca_vehiculo_id' => $marca_vehiculo->id,
                    'seccion_id' => $seccion->id,
                    'precio_id' => $precio->id,
                ]);
            }
            DB::commit();
        }
        catch(\Exception $e)
        {
            DB::rollback();
        }
    }
}

