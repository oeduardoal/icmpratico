app.controller('main', ['$scope', '$http','$timeout','GETAPI',function($scope,$http,$timeout,GETAPI){

	var action = document.location.origin;

	$scope.input = "";
	$scope.action = action;
	$scope.method = "GET";

	$scope.loading = false;
	$scope.filtro = "ncm";
	$scope.getncms = function(){
		$scope.action = "";
		$scope.ncms = "";
		GETAPI.getNcm($scope, function(data){
			$scope.ncms = data.data;
			$scope.loading = false;
		});
		
	}
	$scope.submit = function(){
		if($scope.input.length >= 8){
			console.log('8 NUMEROS');
			window.location = document.location.origin + "/" + $scope.input;
		}else{
			window.location = document.location.origin + "?filtro=" + $scope.filtro + "&" + "s=" + $scope.input;
			$scope.method = "GET";
			var el = angular.element('#form_ncm');
			el.attr('action',document.location.origin);	
			el.attr('method', "GET");	
		}
	}
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
