<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateServicioRequest;
use App\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
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
        $servicio = Servicio::all();
        return response()->json(['dato' => $servicio, 'exito' => true], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateServicioRequest $request)
    {
        $servicio = new Servicio;
        $servicio->nombre           = $request->nombre;
        $servicio->descripcion      = $request->descripcion;
        $servicio->importe          = $request->estado;
        $servicio->tipo_servicio    = $request->tipo_servicio;
        $servicio->estado           = $request->estado;
        $servicio->user_id          = $request->user_id;
        $servicio->categoria_id     = $request->categoria_id;
        $servicio->habilidad_id     = $request->habilidad_id;
        $salida = $servicio->save();
        return response()->json(['dato' => $servicio, 'exito' => $salida], 200);
    }

/**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicio = Servicio::find($id);
        if($servicio !== null)
            return response()->json(['dato' => $servicio, 'exito' => true], 201);
        else
            return response()->json(['Error'=> 'No encontrado', 'exito' => false], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(CreateServicioRequest $request,  $id)
    {
        $servicio = Servicio::find($id);
        if($servicio !== null){
            $salida = $servicio->update($request->all());
            return response()->json(['dato' => $servicio, 'exito' => $salida], 200);
        } else{
            return response()->json(['Error'=> 'No encontrado', 'exito' => false], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicio= Servicio::find($id);  
        if($servicio !== null){
            $salida = $servicio->delete();
            return response()->json(['dato' => $servicio, 'exito' => $salida], 200);
        }else{
            return response()->json(['Error'=> 'No eliminado', 'exito' => false], 400);
        }
    }
}
