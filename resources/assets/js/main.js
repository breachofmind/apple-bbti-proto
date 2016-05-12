(function () {

    // Main application.
    var app = angular.module('app', ['ngAnimate','ngRoute']);

    /**
     * Attaches a crsf token to all AJAX headers.
     * @returns void
     */
    function setupAjaxHeaders()
    {
        var csrf = $('meta[name="csrf_token"]').attr('content');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrf
            }
        });

        app.factory('httpRequestInterceptor', function(){
            return {request: function(config) {
                config.headers['X-CSRF-TOKEN'] = csrf;
                return config;
            }}
        });
        app.config(function($httpProvider) {
            $httpProvider.interceptors.push('httpRequestInterceptor');
        });
    }

    app.config(['$routeProvider','$locationProvider', function($route,$location) {
        $route.when('/t/:tradeId', {
            templateUrl: '/ng/trade.html',
            controller: 'TradeController',
            controllerAs: 'trade'
        })
    }]);

    window.app = app;

    setupAjaxHeaders();

})();



