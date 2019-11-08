<?php

namespace App\Http\Controllers;

use App\Subsede;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SubSedesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    { }

    public function create()
    {
        if (Auth::user()) {
            # code...
            Auth::user()->authorizeRoles(['Administrador', 'Coordinacion']);
            return view('subsedes.create');
        }
        abort('401');
    }

    public function store(Request $request)
    {
        if (Auth::user()) {
            # code...
            Auth::user()->authorizeRoles(['Administrador', 'Coordinacion']);
            Subsede::create($request->all());
            return redirect()->back()->with('status', 'Se ha registrado una nueva subsede exitosamente.');
        }
        abort('401');
    }

    public function edit(Subsede $subsede)
    {
        return view('subsedes.edit', compact('subsede'));
    }

    public function update(Request $request, Subsede $subsede)
    {
        if (Auth::user()) {
            Auth::user()->authorizeRoles(['Administrador', 'Coordinacion']);
            $subsede->fill($request->all());
            $subsede->save();
            return redirect()->back()->with('status', 'Se han guardado los cambios exitosamente');
        }
        abort('401');
    }
}
