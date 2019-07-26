<?php

namespace App\Imports;

use App\MarcaRepuesto;
use App\MarcaVehiculo;
use App\Precio;
use App\PrecioHistorico;
use App\Repuesto;
use App\Seccion;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
//        try
//        {
//            DB::beginTransaction();
        if(($row[0] == "CODIGO")){ //Corrobora que sea el encabezado. Malísimo pero no se me ocurrió otra forma.
            return null;
        }

        set_time_limit(0);

        $repuesto = DB::table('repuestos')
            ->where('codigo', '=', "$row[0]")
            ->join('precios', 'repuestos.precio_id', '=', 'precios.id')
            ->orderBy('precios.created_at','desc')
            ->first();

        if($repuesto != null  && $repuesto->precio_sugerido == $row[6]){
            //dd([$repuesto,$row,'if']);
            return Repuesto::find($repuesto->id);
        }
        else if ($repuesto != null  &&  $repuesto->precio_sugerido != $row[6]) {
//            new PrecioHistorico([
//                'repuesto_id' => $repuesto->id,
//                'precio_id' => $repuesto->precio_id
//                ]
//            );
//            if($row[6] == 11499.13)
//                dd($row[6]);
            $precio = new Precio([
                'precio_sugerido' => $row[6],
                'precio_minorista' => (1+($repuesto->precio_minorista_co/100)) * $row[6],
                'precio_mayorista' => (1+($repuesto->precio_mayorista_co/100)) * $row[6],
                'precio_minorista_co' => $repuesto->precio_minorista_co,
                'precio_mayorista_co' => $repuesto->precio_mayorista_co,
                'precio_taller_co' => $repuesto->precio_taller_co,
                'precio_taller' => (1+($repuesto->precio_taller_co/100)) * $row[6],
            ]);
            $precio->save();
            //$repuesto->id_precio = $precio->id;
//            dd(Repuesto::find($repuesto->id));
            //dd([$repuesto,$row]);

            Precio::find($repuesto->precio_id)->update(
                [
                    'precio_minorista' => (1+($repuesto->precio_minorista_co/100)) * $repuesto->precio_sugerido,
                    'precio_mayorista' => (1+($repuesto->precio_mayorista_co/100)) * $repuesto->precio_sugerido,
                    'precio_taller' => (1+($repuesto->precio_taller_co/100))  * $repuesto->precio_sugerido,
                    'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);

            return Repuesto::find($repuesto->id);
        }
        else{
            //dd([$repuesto,$row,'else']);
            $marca_repuesto = new MarcaRepuesto([
                'nombre' => is_null($row[3]) ? "" : $row[3],
            ]);
            $marca_repuesto->save();

            $marca_vehiculo = new MarcaVehiculo([
                'nombre' => is_null($row[4]) ? "" : $row[4],
            ]);
            $marca_vehiculo->save();

            $seccion = new Seccion([
                'nombre' => is_null($row[5]) ? "" : $row[5],
            ]);
            $seccion->save();

            $precio = new Precio([
                'precio_sugerido' => $row[6],
                'precio_minorista' => $row[6],
                'precio_mayorista' => $row[6],
                'precio_minorista_co' => 1.0,
                'precio_mayorista_co' => 1.0,
                'precio_taller_co' => 1.0,
                'precio_taller' => $row[6],
            ]);

            $precio->save();

            return new Repuesto([
                'codigo' => "$row[0]",
                'descripcion' => $row[1],
                'marca_repuesto_id' => $marca_repuesto->id,
                'marca_vehiculo_id' => $marca_vehiculo->id,
                'seccion_id' => $seccion->id,
                'precio_id' => $precio->id,
            ]);
        }

//        DB::commit();
//        }
//        catch(\Exception $e)
//        {
//            DB::rollback();
//        }
    }
//
}

