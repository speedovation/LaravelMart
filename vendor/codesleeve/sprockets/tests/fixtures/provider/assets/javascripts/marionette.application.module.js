
/**
 * Overriding Marionette.Application to make it 
 * call the queued __modules we found on the constructor
 * instance of our marionette application
 */
Marionette.Application = (function(Application)
{
    Marionette.Application = function(options)
    {
        Application.apply(this, arguments);

        var modules = this.constructor.__modules;
        for (var index in modules)
        {
            this.module.apply(this, modules[index]);
        }
    };

    _.extend(Marionette.Application, Application);

    Marionette.Application.prototype = (function(Prototype)
    {
        Prototype.prototype = Application.prototype;
        return new Prototype;
    })(function() {});

    Marionette.Application.prototype.constructor = Marionette.Application;

    return Marionette.Application;

})(Marionette.Application);

/**
 * Give Marionette the ability to load in modules without having to 
 * construct an actual application instance. This is how it should be
 * done really, in my opinion. Instead of attaching modules to a singleton
 * application. But using this way, allows us to do either. I am not overriding
 * Marionette's module system here, but rather *adding to* it.
 */
Marionette.Application.module = function(name, callback)
{
    this.__modules = (typeof this.__modules === 'undefined') ? [] : this.__modules;
    this.__modules.push([name, callback]);

    return this;
};
