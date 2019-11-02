<?php

namespace App\Http\Controllers;

use App\Sede;
use App\Subsede;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SedesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {  
        $subsedes = Subsede::all();
        $sedes = Sede::nombre($request->nombre)
            ->direccion($request->direccion)
            ->orderBy('nombre')
            ->paginate(5);
        $request->flash();
        return view('sedes.index', compact('sedes','subsedes'));
    }

    public function create()
    {
        Auth::user()->authorizeRoles('Administrador');
        return view('sedes.create');
    }

    public function store(Request $request)
    {
        Auth::user()->authorizeRoles('Administrador');
        Sede::create($request->all());
        return redirect()->back()->with('status', 'Se ha registrado una nueva sede exitosamente.');
    }
    public function edit(Sede $sede)
    {
        Auth::user()->authorizeRoles('Administrador');

        return view('sedes.edit', compact('sede'));
    }
    public function update(Request $request, Sede $sede)
    {
        Auth::user()->authorizeRoles('Administrador');
        $sede->fill($request->all());
        $sede->save();
        return redirect()->back()->with('status', 'Se han guardado los cambios exitosamente');
    }
}
