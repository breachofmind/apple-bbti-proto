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