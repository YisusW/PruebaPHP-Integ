app.controller("cubeController", function($scope, $http, ROUTE, $sce){

	$scope.number_cases;

	// this function make the inputs of the constraint T 
	// for example " the number_cases = 1 " then
	// it will add just 1 (T) constraint to do test

	$scope.add_test = function(){
		

		$scope.form_case = [];
		
		for(var i = 0 ; i < $scope.number_cases ; i ++ ){

			//$scope.form_case.push({m_n: null, n: null, operations: []})

			$scope.form_case.push( {m_n: null, n: null, query: []} )

		}

	}



	$scope.set_m_and_n = function(test_case){	

		console.log( test_case );

		test_case.n = test_case.m_n.split(" ")[0];

		m = test_case.m_n.split(" ")[1];
		
		test_case.operations = [];

		for(var i = 0; i < m; i++){

			test_case.operations.push({operation_name: "", params: ""});

		}

	}

	$scope.add_matrix = function ( value_matrix_queries ){

		console.log( value_matrix_queries );

		value_matrix_queries.query = [];

		for(var i = 0; i < value_matrix_queries.queries ; i++){

			value_matrix_queries.query.push( { query_name : '', dats: '' } );

		}

	}

	$scope.send_data = function(){

		console.log($scope.form_case);

		$http.post(ROUTE, { "fomrdata" : $scope.form_case}).success(
			
			function(response){
				
				console.log( response )

				//$scope.output = $sce.trustAsHtml(response.output.replace(/,/g, "<br/>"));


			});		
	}


})
