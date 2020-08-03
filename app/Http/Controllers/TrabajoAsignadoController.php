<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTrabajoAsignadoRequest;
use App\TrabajoAsignado;
use Illuminate\Http\Request;

class TrabajoAsignadoController extends Controller
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
        $trabajoAsignado = TrabajoAsignado::all();
        return response()->json(['dato' => $trabajoAsignado, 'exito' => true], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTrabajoAsignadoRequest $request)
    {
        $trabajoAsignado = new TrabajoAsignado;
        $trabajoAsignado->estado = $request->estado;
        $trabajoAsignado->trabajo_id = $request->trabajo_id;
        $trabajoAsignado->user_id = $request->user_id;
        $salida = $trabajoAsignado->save();
        return response()->json(['dato' => $trabajoAsignado, 'exito' => $salida], 200);
    }

/**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trabajoAsignado = TrabajoAsignado::find($id);
        if($trabajoAsignado !== null)
            return response()->json(['dato' => $trabajoAsignado, 'exito' => true], 201);
        else
            return response()->json(['Error'=> 'No encontrado', 'exito' => false], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TrabajoAsignado  $trabajoAsignado
     * @return \Illuminate\Http\Response
     */
    public function update(CreateTrabajoAsignadoRequest $request,  $id)
    {
        $trabajoAsignado = TrabajoAsignado::find($id);
        if($trabajoAsignado !== null){
            $salida = $trabajoAsignado->update($request->all());
            return response()->json(['dato' => $trabajoAsignado, 'exito' => $salida], 200);
        } else{
            return response()->json(['Error'=> 'No encontrado', 'exito' => false], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TrabajoAsignado  $trabajoAsignado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trabajoAsignado= TrabajoAsignado::find($id);  
        if($trabajoAsignado !== null){
            $salida = $trabajoAsignado->delete();
            return response()->json(['dato' => $trabajoAsignado, 'exito' => $salida], 200);
        }else{
            return response()->json(['Error'=> 'No eliminado', 'exito' => false], 400);
        }
    }
}
