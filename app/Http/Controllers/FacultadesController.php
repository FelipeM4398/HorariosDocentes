<?php

namespace App\Http\Controllers;

use App\Facultad;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FacultadesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $decanos = User::where('id_tipo_usuario', 2)->get();
        $facultades = Facultad::nombre($request->nombre)
            ->decano($request->decano)
            ->orderBy('nombre')
            ->paginate(5);
        $request->flash();
        return view('facultades.index', compact('facultades', 'decanos'));
    }

    public function create()
    {
        if (Auth::user()) {
            Auth::user()->authorizeRoles('Administrador');
            $decanos = User::whereIdTipoUsuario(2)->get();
            return view('facultades.create', compact('decanos'));
        }
        abort('401');
    }

    public function store(Request $request)
    {
        if (Auth::user()) {
            Auth::user()->authorizeRoles('Administrador');
            Facultad::create($request->all());
            return redirect()->back()->with('status', 'Se ha registrado una nueva facultad exitosamente.');
        }
        abort('401');
    }

    public function edit(Facultad $facultade)
    {
        $decanos = User::whereIdTipoUsuario(2)->get();
        $facultad = $facultade;
        return view('facultades.edit', compact('decanos', 'facultad'));
    }

    public function update(Request $request, Facultad $facultade)
    {
        if (Auth::user()) {
            Auth::user()->authorizeRoles('Administrador');
            $facultad = $facultade;
            $facultad->fill($request->all());
            $facultad->save();
            return redirect()->back()->with('status', 'Se han guardado los cambios exitosamente');
        }
        abort('401');
    }
}
