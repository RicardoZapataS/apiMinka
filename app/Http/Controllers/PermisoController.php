<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePermisoRequest;
use App\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
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
        $permiso = Permiso::all();
        return response()->json(['dato' => $permiso, 'exito' => true], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePermisoRequest $request)
    {
        $permiso = new Permiso;
        $permiso->modulo = $request->modulo;
        $permiso->descripcion = $request->descripcion;
        $salida = $permiso->save();
        return response()->json(['dato' => $permiso, 'exito' => $salida], 200);
    }

/**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permiso = Permiso::find($id);
        if($permiso !== null)
            return response()->json(['dato' => $permiso, 'exito' => true], 201);
        else
            return response()->json(['Error'=> 'No encontrado', 'exito' => false], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePermisoRequest $request,  $id)
    {
        $permiso = Permiso::find($id);
        if($permiso !== null){
            $salida = $permiso->update($request->all());
            return response()->json(['dato' => $permiso, 'exito' => $salida], 200);
        } else{
            return response()->json(['Error'=> 'No encontrado', 'exito' => false], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permiso= Permiso::find($id);  
        if($permiso !== null){
            $salida = $permiso->delete();
            return response()->json(['dato' => $permiso, 'exito' => $salida], 200);
        }else{
            return response()->json(['Error'=> 'No eliminado', 'exito' => false], 400);
        }
    }
}
