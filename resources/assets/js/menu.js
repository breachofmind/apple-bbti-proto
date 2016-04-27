(function (app) {

    app.controller("MenuController", ['$scope', MenuController]);

    function MenuController($scope)
    {
        $scope.isOpen = false;

        this.toggle = function(bool)
        {
            if (! arguments.length) {
                return $scope.isOpen = ! $scope.isOpen;
            }
            return $scope.isOpen = bool;
        };

        this.open = function()
        {
            $scope.isOpen = true;
        }
    }

})(window.app);