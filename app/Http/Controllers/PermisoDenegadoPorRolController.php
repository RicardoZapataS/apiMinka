<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePermisoDenegadoRequest;
use App\PermisoDenegadoPorRol;
use Illuminate\Http\Request;

class PermisoDenegadoPorRolController extends Controller
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
        $permisoDenegadoPorRol = PermisoDenegadoPorRol::all();
        return response()->json(['dato' => $permisoDenegadoPorRol, 'exito' => true], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePermisoDenegadoRequest $request)
    {
        $permisoDenegadoPorRol = new PermisoDenegadoPorRol;
        $permisoDenegadoPorRol->rol_id = $request->rol_id;
        $permisoDenegadoPorRol->permiso_id = $request->permiso_id;
        $salida = $permisoDenegadoPorRol->save();
        return response()->json(['dato' => $permisoDenegadoPorRol, 'exito' => $salida], 200);
    }

/**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permisoDenegadoPorRol = PermisoDenegadoPorRol::find($id);
        if($permisoDenegadoPorRol !== null)
            return response()->json(['dato' => $permisoDenegadoPorRol, 'exito' => true], 201);
        else
            return response()->json(['Error'=> 'No encontrado', 'exito' => false], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PermisoDenegadoPorRol  $permisoDenegadoPorRol
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePermisoDenegadoRequest $request,  $id)
    {
        $permisoDenegadoPorRol = PermisoDenegadoPorRol::find($id);
        if($permisoDenegadoPorRol !== null){
            $salida = $permisoDenegadoPorRol->update($request->all());
            return response()->json(['dato' => $permisoDenegadoPorRol, 'exito' => $salida], 200);
        } else{
            return response()->json(['Error'=> 'No encontrado', 'exito' => false], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PermisoDenegadoPorRol  $permisoDenegadoPorRol
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permisoDenegadoPorRol= PermisoDenegadoPorRol::find($id);  
        if($permisoDenegadoPorRol !== null){
            $salida = $permisoDenegadoPorRol->delete();
            return response()->json(['dato' => $permisoDenegadoPorRol, 'exito' => $salida], 200);
        }else{
            return response()->json(['Error'=> 'No eliminado', 'exito' => false], 400);
        }
    }
}
