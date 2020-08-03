<?php

namespace App\Http\Controllers;

use App\Habilidad;
use App\Http\Requests\CreateHabilidadRequest;
use Illuminate\Http\Request;

class HabilidadController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habilidad = Habilidad::all();
        return response()->json(['dato' => $habilidad, 'exito' => true], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateHabilidadRequest $request)
    {
        $habilidad = new Habilidad;
        $habilidad->nombre = $request->nombre;
        $habilidad->descripcion = $request->descripcion;
        $habilidad->estado = $request->estado;
        $habilidad->categoria_id = $request->categoria_id;
        $salida = $habilidad->save();
        return response()->json(['dato' => $habilidad, 'exito' => $salida], 200);
    }

/**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $habilidad = Habilidad::find($id);
        if($habilidad !== null)
            return response()->json(['dato' => $habilidad, 'exito' => true], 201);
        else
            return response()->json(['Error'=> 'No encontrado', 'exito' => false], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Habilidad  $habilidad
     * @return \Illuminate\Http\Response
     */
    public function update(CreateHabilidadRequest $request,  $id)
    {
        $habilidad = Habilidad::find($id);
        if($habilidad !== null){
            $salida = $habilidad->update($request->all());
            return response()->json(['dato' => $habilidad, 'exito' => $salida], 200);
        } else{
            return response()->json(['Error'=> 'No encontrado', 'exito' => false], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Habilidad  $habilidad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $habilidad= Habilidad::find($id);  
        if($habilidad !== null){
            $salida = $habilidad->delete();
            return response()->json(['dato' => $habilidad, 'exito' => $salida], 200);
        }else{
            return response()->json(['Error'=> 'No eliminado', 'exito' => false], 400);
        }
    }
}
