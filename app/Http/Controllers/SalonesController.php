<?php

namespace App\Http\Controllers;

use App\Salon;
use App\Sede;
use App\Subsede;
use App\TipoSalon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sedes = Sede::all();
        $subsedes = Subsede::all();
        $salones = Salon::nombre($request->nombre)
            ->capacidad($request->capacidad)
            ->sedes($request->sede)
            ->subsedes($request->subsede)
            ->paginate(10);
        $request->flash();
        return view('salones.index', compact('salones', 'sedes', 'subsedes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()) {
            # code...
            Auth::user()->authorizeRoles(['Administrador', 'Coordinacion']);
            $sedes = Sede::all();
            $subsedes = Subsede::all();
            $tipoSalones = TipoSalon::all();
            return view('salones.create', compact('sedes', 'tipoSalones', 'subsedes'));
        }
        abort('401');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()) {
            # code...
            Auth::user()->authorizeRoles(['Administrador', 'Coordinacion']);
            Salon::create($request->all());
            return redirect()->back()->with('status', 'Se ha registrado un nuevo salón exitosamente');
        }
        abort('401');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Salon $salone)
    {
        $subsedes = Subsede::all();
        $sedes = Sede::all();
        $tipoSalones = TipoSalon::all();
        return view('salones.show', compact('salone', 'subsedes', 'sedes', 'tipoSalones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salon $salone)
    {
        if (Auth::user()) {
            # code...
            Auth::user()->authorizeRoles(['Administrador', 'Coordinacion']);
            $salone->fill($request->all());
            $salone->save();
            return redirect()->back()->with('status', 'Se han guardado los cambios exitosamente');
        }
        abort('401');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
