app.controller('main', ['$scope', '$http','$timeout','GETAPI',function($scope,$http,$timeout,GETAPI){

	$scope.loading = false;
	$scope.filtro = "ncm";
	$scope.getncms = function(){
		$scope.ncms = "";
		GETAPI.getNcm($scope, function(data){
			$scope.ncms = data.data;
			$scope.loading = false;
		});
		
	}
	
	var input = $scope.input;

}]);


app.controller('cnae', ['$scope', '$http','$timeout','GETAPI',function($scope,$http,$timeout,GETAPI){
	
	$scope.loading = false;
	$scope.filtro = "cnae";
	$scope.getcnaes = function(){
		$scope.ncms = "";
		GETAPI.getNcm($scope, function(data){
			$scope.ncms = data.data;
			$scope.loading = false;
		});
		
	}
	

	var input = $scope.input;

}]);
