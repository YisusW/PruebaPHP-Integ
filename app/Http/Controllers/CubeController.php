<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Model\Cube;

class CubeController extends Controller
{

    protected $cube;   


    /*===========================================================================
    =            Recibir El Request Enviado desde El formulario Cube            =
    ===========================================================================*/
        

    /**
     * Create a function store to do the topic of Cube Summation.
     * @param  request
     *      
     * @return result
     */        

    public function store( Request $request ){

        $result  = null;


            foreach($request->input('formdata') as $key => $datos){
                # parsear el array a un tipo object (transformar tipo de dato)
                $datos = (object) $datos;

                # instanciar el modelo Cube que se encarga de procesar los
                # datos enviados desde el formulario 
                # en el Constructor se crea la matriz segun lo indique la variable matrix
                #

                if( isset($datos->matrix ) ){

                    $result = $this->run_queries( $datos , (int) $key+1 );
                }

            }

            #devolver los datos correspondiente 
            #resultado de la data procesada

            return response()->json( array( 'result' => $result ) );
         
    }

    /*=====  End of store ======*/


    private function run_queries ( $datos , $numer_t ){

        $this->cube = new Cube( $datos->matrix );

        $result =  array( 'T' => $numer_t ) ;

        # Ahora se recorre otra variable que tambien es un Arreglo
        # *(query) contiene los atributos : ( query_name , dats )
        # *query --> query_name hace referencia a el tipo de operacion a realizar  como ( UPDATE o QUERY )
        # *query --> dats se refiere a los argumentos agregados o a los 
        # parametros con la cual va a trabajar dicha operacion descripta enteriormente
        #        

        foreach( $datos->query as $queries ){

            # separamos los parametros que deberian ser numeros
            # la funcion explode la usamos para obtener los datos correctamente

            $params = explode(" ", $queries["dats"] );

            $queries = (object) $queries;

            # En este verificamos que tipo de query u operacion nos trae *( $queries )
            
            if( $queries->query_name === 'query'  ):

                # si el query_name es query llamamos a la funcion query de la clase instanciada abteriormente

                $result[] = $this->cube->query($params[0], $params[1], $params[2], $params[3], $params[4], $params[5]);

            elseif( $queries->query_name === 'update' ):

                # si el query_name es update se ejecutara lo funcion update de la instancia de la clase Cube
                $this->cube->update($params[0], $params[1], $params[2], $params[3]);

            endif;
            
        }

        return $result;
    }

}
