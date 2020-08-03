<?php

namespace App\Http\Controllers;

use App\Trabajo;
use Illuminate\Http\Request;

class TrabajoController extends Controller
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
        $trabajo = Trabajo::all();
        return response()->json(['dato' => $trabajo, 'exito' => true], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trabajo = new Trabajo;
        $trabajo->nombre = $request->nombre;
        $trabajo->descripcion = $request->descripcion;
        $trabajo->importe_ofertado = $request->importe_ofertado;
        $trabajo->tiempo_limite = $request->tiempo_limite;
        $trabajo->fecha_limite = $request->fecha_limite;
        $trabajo->estado = $request->estado;
        $trabajo->habilidad_id = $request->habilidad_id;
        $trabajo->categoria_id = $request->categoria_id;
        $salida = $trabajo->save();
        return response()->json(['dato' => $trabajo, 'exito' => $salida], 200);
    }

/**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trabajo = Trabajo::find($id);
        if($trabajo !== null)
            return response()->json(['dato' => $trabajo, 'exito' => true], 201);
        else
            return response()->json(['Error'=> 'No encontrado', 'exito' => false], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trabajo  $trabajo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $trabajo = Trabajo::find($id);
        if($trabajo !== null){
            $salida = $trabajo->update($request->all());
            return response()->json(['dato' => $trabajo, 'exito' => $salida], 200);
        } else{
            return response()->json(['Error'=> 'No encontrado', 'exito' => false], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trabajo  $trabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trabajo= Trabajo::find($id);  
        if($trabajo !== null){
            $salida = $trabajo->delete();
            return response()->json(['dato' => $trabajo, 'exito' => $salida], 200);
        }else{
            return response()->json(['Error'=> 'No eliminado', 'exito' => false], 400);
        }
    }
}
