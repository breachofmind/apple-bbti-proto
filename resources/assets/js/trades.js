(function (app)
{

    app.controller('TradeListController', ['$scope','$http', TradeListController]);
    app.controller('TradeController',     ['$scope','$http', TradeController]);

    function TradeListController($scope,$http)
    {
        var self = this;

        $scope.processing = true;

        this.trades = [];


        /**
         * Get all trades from the server.
         * @returns void
         */
        this.getTrades = function()
        {
            $scope.processing = true;
            $http.get('/data/trades').success(function(data) {
                $scope.processing = false;
                self.trades = data;
            });
        };



        // Init
        this.getTrades();
    }



    function TradeController($scope,$http)
    {

    }


})(window.app);