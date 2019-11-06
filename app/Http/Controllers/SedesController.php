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
        return view('sedes.index', compact('sedes', 'subsedes'));
    }

    public function create()
    {
        if (Auth::user()) {
            Auth::user()->authorizeRoles(['Administrador', 'Coordinacion']);
            return view('sedes.create');
        }
        abort('401');
    }

    public function store(Request $request)
    {
        if (Auth::user()) {
            # code...
            Auth::user()->authorizeRoles(['Administrador', 'Coordinacion']);
            Sede::create($request->all());
            return redirect()->back()->with('status', 'Se ha registrado una nueva sede exitosamente.');
        }
        abort('401');
    }

    public function edit(Sede $sede)
    {
        return view('sedes.edit', compact('sede'));
    }

    public function update(Request $request, Sede $sede)
    {
        if (Auth::user()) {
            # code...
            Auth::user()->authorizeRoles(['Administrador', 'Coordinacion']);
            $sede->fill($request->all());
            $sede->save();
            return redirect()->back()->with('status', 'Se han guardado los cambios exitosamente');
        }
        abort('401');
    }
}
