/**
 * Written with love by Kelt <kelt@codesleeve.com>
 *
 * I like computed properties in EmberJS so I made this Backbone.Model override
 * so that I can easily do them now. Basically 
 */
(function(){

    /**
     * [toCamelCase description]
     */
    function toCamelCase(_str)
    {
        var str = _str;
        var placement = str.indexOf('_');

        while (placement !== -1)
        {
            var capitailChar = str.substr(placement + 1, 1).toUpperCase();
            str = str.substr(0, placement) + capitailChar + str.substr(placement+2);
            placement = str.indexOf('_');
        }

        return str;
    }

    /**
     * [toSnakeCase description]
     */
    function toSnakeCase(_str)
    {
        var str = "";

        for(var index = 0; index < _str.length; index++)
        {
            var charAt = _str.charAt(index);

            if (charAt != charAt.toLowerCase()) {
                charAt = '_' + charAt.toLowerCase();
            }

            str = str + charAt;
        }

        return str;
    }

    /**
     * [inArray description]
     */
    function inArray(value, array)
    {
        for (var index in array)
        {
            if (value == array[index]) {
                return index;
            }
        }

        return -1;
    }

    /**
     * Find computed properties in our backbone model and put them
     * in the name we would expect. Here is an example of how to 
     * access the computed property
     * 
     *     getPropName : function() { ... }
     *
     * Fetch value like this...
     * 
     *     this.get('prop_name');
     */
    function getComputedProperites(model)
    {
        var computedProperties = [];

        for(var key in model)
        {
            if(_.isFunction(model[key]))
            {
                if (key.substr(0, 3) === 'get' || key.substr(0, 3) === 'set')
                {
                    var propName = toSnakeCase(key.substr(3)).substr(1);
                    if (propName.length > 0) {
                        computedProperties.push(propName);
                    }
                }
            }
        }

        return _.uniq(computedProperties);
    }

    /**
     * [hasComputedProperty description]
     */
    function hasComputedProperty(model, propName, prefix)
    {
        var funcName = prefix + toCamelCase('_' + propName);

        if (inArray(funcName, model.ignoreMethods) !== -1) {
            return false;
        }

        var func = model[funcName];

        return _.isFunction(func);
    }

    /**
     * [registerEvent description]
     */
    function registerProperty(model, propName)
    {
        var getter = model['get' + toCamelCase('_' + propName)];
        var changes = [];

        if (_.isFunction(getter) && typeof getter.__properties !== 'undefined')
        {
            changes = getter.__properties;
        }

        for (var index in changes)
        {
            model.on('change:' + changes[index], function() {
                model.trigger('change:' + propName);
            });
        }
    }

    /**
     * [setupEvents description]
     */
    function setupEvents(model)
    {
        var properties = getComputedProperites(model);

        for (var index in properties)
        {
            registerProperty(model, properties[index]);
        }
    }

    /**
     * Store the original get function so I can use it later
     */
     var origGet = Backbone.Model.prototype.get;

    /**
     * [backboneGet description]
     */
    function backboneGet(attr)
    {
        if (hasComputedProperty(this, attr, 'get'))
        {
            var getter = this['get' + toCamelCase('_' + attr)];
            return getter.call(this);
        }

        return origGet.call(this, attr);
    }

    /**
     * Store the original set function so I can use it later
     */
     var origSet = Backbone.Model.prototype.set;

    /**
     * [backboneSet description]
     */
    function backboneSet(attr, value)
    {
        if (hasComputedProperty(this, attr, 'set'))
        {
            var setter = this['set' + toCamelCase('_' + attr)];
            return setter.call(this, value);
        }

        return origSet.apply(this, [attr, value]);
    }

    /**
     * Store the original toJSON function so I can use it later
     */
    var origToJSON = Backbone.Model.prototype.toJSON

    /**
     * [backboneToJSON description]
     */
    function backboneToJSON(options)
    {
        var data = origToJSON.call(this, options);
        var properties = getComputedProperites(this);

        for (var index in properties)
        {
            var attr = properties[index];
            if (hasComputedProperty(this, attr, 'get'))
            {
                var getter = this['get' + toCamelCase('_' + attr)];
                data[attr] =  getter.call(this, options);
            }
        }
        
        return data;
    }

    /**
     * This is much like EmberJS's property
     * on the EmberOjects. Allows us to set
     * change events on computed properties
     */
    Function.prototype.property = function()
    {
        this.__properties = arguments;
        return this;
    }

    /**
     * Overriding the Backbone.Model to make it
     * register trigger events in the right place
     */
    Backbone.Model = (function(Model)
    {
        Backbone.Model = function(attributes, options)
        {
            Model.apply(this, arguments);
     
            setupEvents(this);
        };

        _.extend(Backbone.Model, Model);

        Backbone.Model.prototype = (function(Prototype)
        {
            Prototype.prototype = Model.prototype;
            return new Prototype;
        })(function() {});

        Backbone.Model.prototype.constructor = Backbone.Model;

        return Backbone.Model;

    })(Backbone.Model);


    Backbone.Model.prototype.toJSON = backboneToJSON;
    Backbone.Model.prototype.set = backboneSet;
    Backbone.Model.prototype.get = backboneGet;

})();