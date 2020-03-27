<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Casa;

class CasasApiController extends Controller
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
    public function index(Request $request)
    {
        // Cada respuesta regresa 20 casas.
        $valorLimite = 20;

        // Solicito información
        $paginaActual = intval($request->input('pagina'));
        if(!$paginaActual) {
            $paginaActual = 1;
        }

        $numeroCasas = Casa::count();
        $numeroPaginas = ceil($numeroCasas / $valorLimite);
        $casas = 
            Casa::where('id_user', $request->user()->id)->
            skip(($paginaActual -1) * $valorLimite)->take($valorLimite)->get();

        // Construyo respuesta.
        $respuesta = array();
        $respuesta['total'] = $numeroCasas;
        $respuesta['paginas'] = $numeroPaginas;
        $respuesta['pagina_actual'] = $paginaActual;
        $respuesta['casas'] = $casas;

        // Envío respuesta.
        return $respuesta;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Crea la instancia del modelo
        $nuevaCasa = new Casa();
        // Llena el modelo con info de la solicitud
        $nuevaCasa->id_user = $request->user()->id;
        $nuevaCasa->calle = $request->input('calle');
        $nuevaCasa->numero = $request->input('numero');
        $nuevaCasa->numero_interior = $request->input('numero_interior');
        $nuevaCasa->colonia = $request->input('colonia');
        $nuevaCasa->numero_banos = $request->input('numero_banos');
        $nuevaCasa->numero_habitantes = $request->input('numero_habitantes');

        // Arma una respuesta
        $respuesta = array();
        $respuesta['exito'] = false;

        // Valida si hay info en el modelo de nuevaCasa
        if($nuevaCasa->save()) {
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
