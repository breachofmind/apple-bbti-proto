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