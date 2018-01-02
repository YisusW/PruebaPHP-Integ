<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class CubeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /*=============================================
    =            Section comment block            =
    =============================================*/

    private function validate__( $datos ){

       return  Validator::make($datos, [
            'entrada' => 'required|integer|min:1|max:255'
        ]);        

        
    }
    
    /*=====  End of Section comment block  ======*/
    
    


    /*===========================================================================
    =            Recibir El Request Enviado desde El formulario Cube            =
    ===========================================================================*/
        

    public function store( Request $request ){

        if( $request->ajax() ){

            # verificar que el dato de  entrada sea Numero
            # llamando la funcion validate
             $result = $this->validate__( $request->all() );

             #si la validacion detecta un error en los datos devuelve mensajes
             if( $result->fails() ){

                
                return response()->json( array('message' => 'La entrada no tiene el formato correcto'  ) );
                
             }


            #devolver los datos correspondiente
            return response()->json( $request );
        }
    }

    /*=====  End of store ======*/
    
}
