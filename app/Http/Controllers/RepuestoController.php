<?php

namespace App\Http\Controllers;

use App\Repuesto;
use Illuminate\Http\Request;
use App\Imports\RepuestosImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class RepuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('repuesto.create', ['categorias'=>'hola',]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
//        DB::connection()->disableQueryLog();
        Excel::import(new RepuestosImport,request()->file('file'));
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function actualizar()
    {
        //
        return view('repuesto/actualizar', ['categorias'=>'hola',]);

    }

    public function autocomplete(Request $request)
    {
//        $data = Repuesto::select('nombre','codigo','idarticulo','ultimoprecio')
//            ->where('nombre','LIKE','%'.$request->get('query').'%')
//            ->where('estado','=','Activo')
//            ->orwhere('codigo','LIKE','%'.$request->get('query').'%')
//            ->get();
        $data = Repuesto::select('codigo','descripcion')
            ->where('descripcion','LIKE','%'.$request->get('query').'%')
            ->orwhere('codigo','LIKE','%'.$request->get('query').'%')
            ->get();
//        $data = Repuesto::whereRaw(DB::raw('CONCAT(codigo," ",descripcion)'), 'like', $request->get('query'))->get();
        return response()->json($data);
    }
}
