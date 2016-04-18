(function () {

    // Main application.
    var app = angular.module('app', []);

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

    window.app = app;

    setupAjaxHeaders();

})();



