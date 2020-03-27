<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Negocio;

class NegociosApiController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nuevoNegocio = new Negocio();

        $nuevoNegocio->id_user = $request->user()->id;
        $nuevoNegocio->calle = $request->input('calle');
        $nuevoNegocio->numero = $request->input('numero');
        $nuevoNegocio->numero_interior = $request->input('numero_interior');
        $nuevoNegocio->colonia = $request->input('colonia');
        $nuevoNegocio->nombre_negocio = $request->input('nombre_negocio');
        $nuevoNegocio->numero_empleados = $request->input('numero_empleados');
        $nuevoNegocio->numero_banos = $request->input('numero_banos');

        $respuesta = array();
        $respuesta['exito'] = false;

        if($nuevoNegocio->save()) {
            $respuesta['exito'] = true;
        }

        // Regresa una respuesta
        return $respuesta;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
