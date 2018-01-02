app.controller("cubeController", function($scope, $http, ROUTE, $sce){

	$scope.number_cases;

	// this function make the inputs of the constraint T 
	// for example " the number_cases = 1 " then
	// it will add just 1 (T) constraint to do test

	$scope.add_test = function(){
		

		$scope.form_case = [];
		
		for(var i = 0 ; i < $scope.number_cases ; i ++ ){

			$scope.form_case.push( { query: []} )

		}

	}



	$scope.add_matrix = function ( value_matrix_queries ){

		console.log( value_matrix_queries );

		value_matrix_queries.query = [];

		for(var i = 0; i < value_matrix_queries.queries ; i++){

			value_matrix_queries.query.push( { query_name : '', dats: '' } );

		}

	}


	// Enviar los datos tomados del formulario
	// para procesarlos correctamente con PHP y dar respuesta logica
	// con respecto a el cubo summation

	$scope.send_data = function(){


		$http.post(ROUTE, { "formdata" : $scope.form_case}).success(
			
			function(response){

				$scope.output = $sce.trustAsHtml(response.output.replace(/,/g, "<br/>"))
				console.log( response.replace(/,/g, "<br/>") )
				console.log( $scope.output );
				//$scope.output = $sce.trustAsHtml(response.output.replace(/,/g, "<br/>"));


			});		
	}


})
