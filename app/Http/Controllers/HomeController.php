<?php

namespace App\Http\Controllers;
use App\Mail\AcceptMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;
use App\User;

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
//        dd(auth()->guest());
        return view('home');
    }

    public function clientesSinActivar()
    {
        //Articulo mçàs vendido

//        $collection = DB::table('articulo')
//            ->select(DB::raw('COUNT(*) as cantidad'))
//            ->where('stock','=','0')
//            ->where('estado','=','Activo')
//            ->get();
//
//        return $collection;
        $users = User::whereHas('roles', function($q){
            $q->where('name', 'cliente_sin_categorizar');
        })->get();

//        $data = Repuesto::whereRaw(DB::raw('CONCAT(codigo," ",descripcion)'), 'like', $request->get('query'))->get();
        return response()->json(count($users));
    }



    public function sendFeedback()
    {
        $comment = 'Hola Loquincha. Como andas wey.';
        $toEmail = "alejandrocolautti@gmail.com";
        Mail::to($toEmail)->send(new AcceptMail($comment));

        return 'Email has been sent to '. $toEmail;
    }

}
