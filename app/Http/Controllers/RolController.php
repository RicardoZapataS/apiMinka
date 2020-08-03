<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRolRequest;
use App\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
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
        $rol = Rol::all();
        return response()->json(['dato' => $rol, 'exito' => true], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRolRequest $request)
    {
        $rol = new Rol;
        $rol->nombre = $request->nombre;
        $salida = $rol->save();
        return response()->json(['dato' => $rol, 'exito' => $salida], 200);
    }

/**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rol = Rol::find($id);
        if($rol !== null)
            return response()->json(['dato' => $rol, 'exito' => true], 201);
        else
            return response()->json(['Error'=> 'No encontrado', 'exito' => false], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(CreateRolRequest $request,  $id)
    {
        $rol = Rol::find($id);
        if($rol !== null){
            $salida = $rol->update($request->all());
            return response()->json(['dato' => $rol, 'exito' => $salida], 200);
        } else{
            return response()->json(['Error'=> 'No encontrado', 'exito' => false], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rol= Rol::find($id);  
        if($rol !== null){
            $salida = $rol->delete();
            return response()->json(['dato' => $rol, 'exito' => $salida], 200);
        }else{
            return response()->json(['Error'=> 'No eliminado', 'exito' => false], 400);
        }
    }
}
