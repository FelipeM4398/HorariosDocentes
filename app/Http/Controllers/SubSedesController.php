<?php

namespace App\Http\Controllers;

use App\Sede;
use App\Subsede;
use App\User;
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
        Auth::user()->authorizeRoles('Administrador');
        return view('subsedes.create');
    }

    public function store(Request $request)
    {
        Auth::user()->authorizeRoles('Administrador');
        SubSede::create($request->all());
        return redirect()->back()->with('status', 'Se ha registrado una nueva subsede exitosamente.');
    }
    public function edit(Subsede $subsede)
    {
        Auth::user()->authorizeRoles('Administrador');

        return view('subsedes.edit', compact('subsede'));
    }
    public function update(Request $request, SubSede $subsede)
    {
        Auth::user()->authorizeRoles('Administrador');
        $subsede->fill($request->all());
        $subsede->save();
        return redirect()->back()->with('status', 'Se han guardado los cambios exitosamente');
    }
}
