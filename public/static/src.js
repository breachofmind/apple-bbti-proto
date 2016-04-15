(function () {

    // Main application.
    var app = angular.module('app', []);

    app.controller('AppController', ['$http','$scope', function($http,$scope)
    {
        $scope.selected = {};

        $scope.modelSearchField = "";
        $scope.capacities = [];
        $scope.colors = {};

        this.lookup = [];
        this.models = {};

        this.selectModel = function(model)
        {
            // Needs to reset selections, since things may change.
            reset();
            $scope.selected.model = model;
            this.getSelectedObjects();
            scrollTo('CapacitySelection');
        };

        this.selectCapacity = function(capacity)
        {
            $scope.selected.color = null;
            $scope.selected.capacity = capacity;
            this.getSelectedObjects();
            scrollTo('ColorSelection');
        };

        this.selectColor = function(color)
        {
            $scope.selected.color = color;
            this.getSelectedObjects();
            scrollTo('ReviewSelection');
        };

        this.modelSearch = function()
        {
            var value = $scope.modelSearchField.toUpperCase();
            this.lookup.forEach(function(device) {
                if (value === device.model) {
                    this.selectModel(device.model);
                }
            }.bind(this));
        };

        this.getSelectedObjects = function()
        {
            var sel = $scope.selected;
            var model = this.models[sel.model];
            if (! model) {
                $scope.colors = {};
                $scope.capacities = [];
            }
            var capacities = [];
            var colors = {};

            model.variations.forEach(function(item) {
                if (capacities.indexOf(item.capacity) == -1) {
                    capacities.push(item.capacity);
                }
                if (sel.capacity && item.capacity==sel.capacity) {
                    colors[item.colorClass] = item.color;
                }
            });
            $scope.capacities = capacities;
            $scope.colors = colors;
        };

        this.getSelectedDevice = function()
        {
            var sel = $scope.selected;
            if (! this.isComplete()) {
                return null;
            }
            return ["Apple",this.models[sel.model].name, sel.capacity+"GB",sel.color].join(" ");
        };

        this.isComplete = function()
        {
            var sel = $scope.selected;
            return sel.model && sel.capacity && sel.color;
        };

        this.comingSoon = function()
        {
            console.log($scope.selected);
            alert("More to come... Check console for POST result");

        };

        function reset ()
        {
            $scope.selected = {
                model:null, capacity:null, color:null
            }
        }


        function getModels (lookup)
        {
            var models = {};
            lookup.forEach(function(item) {
                if (! models[item.model]) {
                    models[item.model] = {
                        name:item.name,
                        image:item.image,
                        variations: []
                    }
                }
                models[item.model].variations.push({
                    capacity: item.capacity,
                    color: item.color,
                    colorClass: item.colorClass
                });
            });

            return models;
        }

        reset();

        $http.get('/devices', null).success(function(data){
            this.lookup = data;
            this.models = getModels(data);
        }.bind(this));
    }]);

})();



function scrollTo(id)
{
    $('html,body').animate({
        scrollTop: $("#"+id).offset().top
    },300);
    //TweenLite.to(window, 2, {scrollTo:{y:}, ease:Power2.easeOut});
}
//# sourceMappingURL=src.js.map
