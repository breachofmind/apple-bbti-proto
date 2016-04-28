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

// Polyfill for lame-ass IE
if (!Array.prototype.find) {
    Array.prototype.find = function(predicate) {
        if (this === null) {
            throw new TypeError('Array.prototype.find called on null or undefined');
        }
        if (typeof predicate !== 'function') {
            throw new TypeError('predicate must be a function');
        }
        var list = Object(this);
        var length = list.length >>> 0;
        var thisArg = arguments[1];
        var value;

        for (var i = 0; i < length; i++) {
            value = list[i];
            if (predicate.call(thisArg, value, i, list)) {
                return value;
            }
        }
        return undefined;
    };
}