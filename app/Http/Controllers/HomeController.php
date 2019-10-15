<?php

namespace App\Http\Controllers;

use App\TipoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $rol = TipoUsuario::query()->where('id', '=', Auth::user()->id_tipo_usuario)->first();
        return view('home', compact('rol'));
    }
}
