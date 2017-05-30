app.config(function($stateProvider,$urlRouterProvider, $locationProvider){
	// $locationProvider.hashPrefix('');
	// $urlRouterProvider.otherwise('/');
	// $locationProvider.html5Mode(true);
});

app.constant("configs",{
	domain: document.location.origin
});
