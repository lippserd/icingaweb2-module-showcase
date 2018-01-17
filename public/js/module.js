(function(Icinga) {

    var Showcase = function(module) {
        this.module = module;
        this.initialize();
        this.module.icinga.logger.debug('Showcase module loaded');
    };

    Showcase.prototype = {

        initialize: function()
        {
            this.module.on('rendered', this.onRender);
            this.module.icinga.logger.debug('Showcase module initialized');
        },

        onRender: function(event) {
            var $container = $(event.currentTarget);

            // Do some magic. This handler is called every time content of the showcase module has been rendered.

            this.module.icinga.logger.debug('Showcase module render event');
        }
    };

    Icinga.availableModules.showcase = Showcase;

}(Icinga));
