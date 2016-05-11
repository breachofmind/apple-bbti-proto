(function (app)
{

    app.controller('TradeController', ['$scope','$http', TradeController]);

    function TradeController($scope,$http)
    {
        var self = this;
        $scope.processing = true;


        this.trades = [];


        this.getTrades = function()
        {
            $scope.processing = true;
            $http.get('/data/trades').success(function(data) {
                $scope.processing = false;
                self.trades = data;
            });
        };

        this.getTrades();
    }

})(window.app);