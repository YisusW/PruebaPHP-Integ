@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-10 col-md-offset-2">
           
            <div class="panel panel-default">
                
                <div class="panel-heading">Cube Summation</div>

                <div ng-app="cubeSumation" class="panel-body">
                            
                <div  ng-controller="cubeController">

           
                        
                        <div class="form-group">

                        <label id="testCase">Constrain T</label>

                        <input class="form-control" type="number" 
                        min="1" max="50"    
                        ng-model="number_cases"
                        ng-change="add_test()"
                        />


                        </div>

                        <div class="form-group">
                            <btn class="btn btn-success btn-block" ng-click="send_data()">
                            Send Data </btn>
                        </div>

                    

                    <!-- Codigo donde 
                        agregan los parametros para 
                        ontinuar el con el Test
                        o Probar el app por completo -->                    

                    <div ng-repeat="(key , value) in form_case">

                        <fieldset class="form-group"></fieldset>                
                            
                            <legend>T # @{{ key + 1 }}</legend>

                            {{-- hacer un formulario por cuestion de Dise#o --}}
                

                            <form >

                                <div class="col-md-12">

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label for="n_matrix@{{key}}">Dimension of the cube ( Constrain N ) </label>
                                            
                                            <input  type="number"
                                                    class="form-control"
                                                    id="n_matrix@{{key}}"
                                                    autofocus
                                                    ng-model="value.matrix">
                                        
                                        </div> {{-- class="form-group" --}}

                                    </div>  {{-- class="col-md-6" --}}

                        

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label for="n_queries@{{ key }}">Amount of Queries ( Constrain M ) </label>
                                            
                                            <input  type="number"
                                                    class="form-control"
                                                    id="n_queries@{{ key }}"
                                                    ng-model="value.queries">
                                        
                                        </div>{{-- class="form-group"  --}}

                                    </div> {{-- class="col-md-6" --}}
                                    
                                    <div class="form-group">
                                        
                                        <div class="col-md-12">
                                        
                                        <button type="button" class="btn btn-primary btn-block"
                                        ng-model="value"
                                        ng-click="add_matrix(value)">Next</button>
                                        
                                        </div>

                                    </div>

                                    
                                </div> {{-- class="col-md-12" --}}

                            </form>
                                


                        <div ng-repeat="(key_num , el) in value.query track by $index" >
                            
                            <form>

                                <div class="col-md-12">

                                    <div class="col-md-6">

                                        <div class="form-group">

                            <label  > Query </label>

                            <select id="@{{ $index }}" ng-model="el.query_name" class="form-control">                         
                                <option value="update">UPDATE</option>
                                <option value="query">QUERY</option>

                            </select>
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                            <label  > Parameters </label>

                            <input  class="form-control" ng-model='el.dats' >

                                        </div>

                                    </div>

                                </div>            

                            </form>

                        </div>

                        
                    </div>


                </div> {{-- class="row" ng-controller="cubeController"  --}}

                </div> {{-- ng-app="cubeSumation" class="panel-body" --}}

            </div>
        </div>
    </div>
</div>



@endsection
