<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CubeController extends Controller
{
    //

    public function store( Request $request ){

    	if( $request->ajax() ){

    	
    		return response()->json([ $request ]);
    	}

    }
}
