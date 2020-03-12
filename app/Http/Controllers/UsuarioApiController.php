<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioApiController extends Controller
{
    public function usuario(Request $request) {
        return $request->user();
    }

    public function suma(Request $request) {
        $operando1 = $request->input('operando_1');
        $operando2 = $request->input('operando_2');

        if($operando1 == NULL || $operando2 = NULL) {
            $respuesta['exito'] = false;
            $respuesta['error'] = "Falta un operando";
            return $respuesta;
        }

        $suma = $operando1 + $operando2;

        $respuesta = array();
        $respuesta['exito'] = true;
        $respuesta['suma'] = $suma;

        return $respuesta;
    }
}
