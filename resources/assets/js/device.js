(function () {

    var Device = Backbone.Model.extend({

        defaults: {
            brand: "Apple"
        },

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

        getModel: function(name)
        {
            return new DeviceCollection(this.where({model: name}));
        },

        getModels: function()
        {
            return this.unique('model');
        },

        getCapacities: function()
        {
            return this.unique('capacity').map(function(item) {
                return item.get('capacity');
            });
        },

        getColors: function()
        {
            return this.unique('color');
        },

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