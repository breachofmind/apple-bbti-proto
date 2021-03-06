(function () {

    var menuOffsetAt = 960;
    var menuOffset = 80;

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

    /**
     * Questions to get values for.
     * @type {string[]}
     */
    var fields = ['q1','q2','q3','q4','q5','carrier'];

    app.controller('AppController', ['$http','$scope', AppController]);

    app.controller('FormController', ['$http','$scope', FormController]);

    /**
     * Controls the
     * @param $http
     * @param $scope
     * @constructor
     */
    function FormController($http,$scope)
    {
        $scope.response = null;

        // Initial setup.
        fields.forEach(function(field)
        {
            $scope[field] = null;
        });

        /**
         * Submit the form, if valid.
         * @returns void
         */
        $scope.submit = function()
        {
            if ($scope.inspectionForm.$valid) {
                $http.post('/evaluate', getPayload()).success(function(response) {
                    scrollTo('valueSection');
                    $scope.response = response;
                });
            }
        };

        /**
         * Return a JSON object containing the POST payload.
         * @returns {{}}
         */
        function getPayload()
        {
            var out = fields.hash(function(field) {
                var str = $scope[field];
                var val = str == "1" || str == "0" ? str === "1" : str; // convert to boolean.
                return [field, val];
            });
            out.device = $scope.$parent.selected.toJSON();
            return out;
        }

    }

    /**
     * The Application Controller instance.
     * @param $http
     * @param $scope
     * @constructor
     */
    function AppController($http,$scope)
    {
        $scope.isLoading = true;

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
         * @returns boolean
         */
        $scope.modelSearch = function()
        {
            var value = $scope.modelSearchField.toUpperCase();

            for(var i=0; i<lookup.length; i++)
            {
                var device = lookup.models[i];
                if (device.get('models').indexOf(value) > -1) {
                    $scope.select_model(device);
                    return $scope.modelSearchError = false;
                }
            }
            return $scope.modelSearchError = value.length > 1;
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

                scrollTo(next ? next+"Section" : 'reviewSection');
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
         * Move to the next area.
         * @param id string
         * @returns void
         */
        $scope.nextQuestion = function(id)
        {
            scrollTo(id, 768);
        };

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
            return new DeviceCollection (lookup.where(search)).unique(nextKey).toJSON();
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


        // Do the deed.
        $http.get('/data/devices', null).success(function(data){

            lookup.reset(data);
            $scope["options_"+steps[0]] = lookup.unique(steps[0]).toJSON();
            $scope.isLoading = false;

        }.bind(this));
    }


    /**
     * Scroll to the next section.
     * @param id string
     * @param minWidth Number
     * @returns void
     */
    function scrollTo(id,minWidth)
    {
        var isMin = menuOffsetAt > window.innerWidth;
        if (minWidth && minWidth < window.innerWidth) {
            return;
        }
        $('html,body').animate({
            scrollTop: $("#"+id).offset().top - (isMin ? menuOffset : 0)
        },1000,'easeInOutExpo');
        //TweenLite.to(window, 2, {scrollTo:{y:}, ease:Power2.easeOut});
    }

})();