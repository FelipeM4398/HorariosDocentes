<?php

namespace App\Http\Controllers;
use App\Grupo;
use Illuminate\Http\Request;

class GruposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $grupos=Grupo::paginate(10);
        return view('grupos.index',compact('grupos'));
   /*   $grupos = Grupo::paginate();
        return view('grupos.index', compact('grupos'));
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('grupos.create');
 
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        Grupo::create(
            $request->all()
        ); 
        return view('grupos.create');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\grupo $grupos
     * @return \Illuminate\Http\Response
     */
    public function show(grupo $grupo)
    { }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\grupo $grupos
     * @return \Illuminate\Http\Response
     */
    public function edit(grupo $grupo)
    {
        return view('grupos.edit', compact('grupo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\grupo $grupos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, grupo $grupo)
    {
        $grupo->codigo = $request->codigo;
        $grupo->nombre = $request->nombre;
        $grupo->creditos = $request->creditos;
        $grupo->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param grupo $grupo
     * @return void
     */
    public function destroy(grupo $grupo)
    {
        //
    }
}
