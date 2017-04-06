app.controller('main', ['$scope', '$http','$timeout','NCMS',function($scope,$http,$timeout,NCMS){

	
	$scope.loading = true;
	$scope.filtro = "ncm";
	$scope.getncms = function(){
		$scope.ncms = "";
		NCMS.getNcm($scope, function(data){
			$scope.ncms = data.data;
			$scope.loading = false;
			console.log($scope.vazio)
		});
		
	}
	

	var input = $scope.input;

}]);
