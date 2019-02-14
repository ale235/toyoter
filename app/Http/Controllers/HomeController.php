<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use \Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

//        Role::create(['name'=>'admin']);
//        Role::create(['name'=>'cliente_minorista']);
//        Role::create(['name'=>'cliente_mayorista']);
//        Role::create(['name'=>'cliente_personalizado']);
//
//        Permission::create(['name'=>'ver_precio']);


//        auth()->user()->givePermissionTo('ver_precio');
        //auth()->user()->assignRole('admin');
        dd(auth()->guest());
        return view('home');
    }
}
