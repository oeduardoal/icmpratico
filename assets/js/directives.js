app.directive('ngDelay', ['$timeout', function ($timeout) {
    return {
        restrict: 'A',
        scope: true,
        compile: function (element, attributes) {
            var expression = attributes['ngChange'];
            if (!expression)
                return;
            
            var ngModel = attributes['ngModel'];
            if (ngModel) attributes['ngModel'] = '$parent.' + ngModel;
            attributes['ngChange'] = '$$delay.execute()';
            
            return {
                post: function (scope, element, attributes) {
                    scope.$$delay = {
                        expression: expression,
                        delay: scope.$eval(attributes['ngDelay']),
                        execute: function () {
                            var state = scope.$$delay;
                            state.then = Date.now();
                            $timeout(function () {
                                if (Date.now() - state.then >= state.delay)
                                    scope.$parent.$eval(expression);
                            }, state.delay);
                        }
                    };
                }
            }
        }
    };
}]);

app.directive("submit", [function () {
    return {
        scope: {
            submit: "="
        },
        link: function (scope, element, attributes) {
            element.bind("submit", function (loadEvent) {
                return scope.submit(loadEvent);
            });
        }
    }
}]);