/**
 * Converts the array to a hash map (POJO)
 * @param callback that returns [key,value]
 * @returns {{}}
 */
Array.prototype.hash = function(callback)
{
    var out = {};
    this.forEach(function(item,i) {
        var arr = callback(item,i);
        if (arr) {
            out[arr[0]] = arr[1];
        }
    });
    return out;
};
(function () {

    /**
     * The Device model.
     * @type Backbone.Model
     */
    var Device = Backbone.Model.extend({

        defaults: {
            brand: "Apple"
        },

        /**
         * Returns the computed name for the device.
         * @returns {string}
         */
        getName: function()
        {
            return [
                this.get('brand'),
                this.get('name'),
                this.get('capacity')+"GB",
                this.get('color')]
                .join(" ");
        }
    });


    /**
     * The Device collection class.
     * @type Backbone.Collection
     */
    var DeviceCollection = Backbone.Collection.extend({
        model: Device,

        byModel: function()
        {
            var out = {};
            this.each(function(item) {
                if (! out[item.get('model')]) out[item.get('model')] = [];

                out[item.get('model')].push(item);
            });

            return out;
        },

        /**
         * Returns all devices that have the same model name.
         * @param name string
         * @returns {Backbone.Collection}
         */
        getModel: function(name)
        {
            return new DeviceCollection(this.where({model: name}));
        },

        /**
         * Returns all unique models.
         * @returns {DeviceCollection}
         */
        getModels: function()
        {
            return this.unique('model');
        },

        /**
         * Returns all unique capacities in the collection.
         * @returns {Array}
         */
        getCapacities: function()
        {
            return this.unique('capacity').map(function(item) {
                return item.get('capacity');
            });
        },

        /**
         * Return all unique colors in the collection.
         * @returns {DeviceCollection}
         */
        getColors: function()
        {
            return this.unique('color');
        },

        /**
         * Returns unique values with the given key.
         * @param key string
         * @returns {Backbone.Collection}
         */
        unique: function(key)
        {
            var out = [];
            var compare = function(device) {
                return function(item) {
                    return item[key] === device[key];
                }
            };

            this.each(function(item)
            {
                var device = item.toJSON();
                if (! out.find(compare(device))) {
                    out.push(device);
                }
            });

            return new DeviceCollection(out);
        }
    });



    window.Device = Device;
    window.DeviceCollection = DeviceCollection;
})();
(function () {

    // Main application.
    window.app = angular.module('app', []);

})();




(function () {

    /**
     * The master lookup collection of devices.
     * @type DeviceCollection
     */
    var lookup = new DeviceCollection();

    /**
     * Steps available for this app. Can be expanded if needed!
     * The names correspond to a property on the Device model.
     * @type {string[]}
     */
    var steps = ['model','capacity','color'];

    app.controller('AppController', ['$http','$scope', AppController]);

    /**
     * The Application Controller instance.
     * @param $http
     * @param $scope
     * @constructor
     */
    function AppController($http,$scope)
    {
        /**
         * Variable for the model search input.
         * @type {string}
         */
        $scope.modelSearchField = "";

        /**
         * If no model is found when searching, changes to true.
         * @type {boolean}
         */
        $scope.modelSearchError = false;

        /**
         * The selected device, when all is said and done.
         * @type {Device|null}
         */
        $scope.selected = null;

        /**
         * Search for a model in the lookup array.
         * @returns void
         */
        $scope.modelSearch = function()
        {
            var value = $scope.modelSearchField.toUpperCase();

            for(var i=0; i<lookup.length; i++)
            {
                var device = lookup.models[i];
                if (value === device.get('model')) {
                    $scope.select_model(device);
                    $scope.modelSearchError = false;
                    return;
                }
            }
            $scope.modelSearchError = value.length > 1;
        };

        /**
         * Set up for each step.
         * If choosing a previous step, will clear selections for future steps.
         * Picks out the array of objects for the next step.
         */
        steps.forEach(function(step,i)
        {
            var prev = steps[i-1] ? steps[i-1] : null;
            var next = steps[i+1] ? steps[i+1] : null;

            $scope[step] = null;
            $scope["options_"+step] = [];
            $scope["select_"+step] = function(object)
            {
                for (n=i+1; n<steps.length; n++) {
                    $scope[steps[n]] = null;
                    $scope["options_"+steps[n]] = [];
                }
                $scope[step] = object.id;
                if (next) {
                    $scope["options_"+next] = getNext(i);
                }

                $scope.selected = getSelected();

                scrollTo(next ? next : 'review');
            }
        });

        /**
         * The currently selected device id's.
         * @returns object
         */
        $scope.selections = function()
        {
            return steps.hash(function(step,i) {
                return [step, $scope[step]];
            })
        };


        /**
         * User can continue... // TODO
         */
        this.comingSoon = function()
        {
            alert('thanks');
        };


        // Do the deed.
        $http.get('/devices', null).success(function(data){

            lookup.reset(data);
            $scope["options_"+steps[0]] = lookup.unique(steps[0]).toJSON();

        }.bind(this));


        /**
         * Return the next group of devices (unique attributes).
         * @param n int
         * @returns {Array}
         */
        function getNext(n)
        {
            var nextKey = steps[n+1];
            if (n === null || ! nextKey) return null;

            var search = {};
            while(n >= 0) {
                var key = steps[n];
                search[key] = lookup.get($scope[key]).get(key);
                n --;
            }
            return  new DeviceCollection (lookup.where(search)).unique(nextKey).toJSON();
        }

        /**
         * Return the selected Device model if all selections have been made.
         * @returns {Device|null}
         */
        function getSelected()
        {
            var last = $scope[steps[steps.length-1]];
            if (! last) {
                return null;
            }

            return lookup.get(last);
        }
    }


    /**
     * Scroll to the next section.
     * @param id string
     * @returns void
     */
    function scrollTo(id)
    {
        $('html,body').animate({
            scrollTop: $("#"+id+"Section").offset().top
        },1000,'easeInOutExpo');
        //TweenLite.to(window, 2, {scrollTo:{y:}, ease:Power2.easeOut});
    }

})();
//# sourceMappingURL=src.js.map
