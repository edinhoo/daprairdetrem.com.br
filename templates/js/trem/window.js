var W = (function() {

    // public

    this.$window = $(window);
    this.width = 1280;
    this.height = 800;

    this.resize = function(callback) {
        $window.resize(callback);
    }
    

    // private

    setup();

    function setup() {
        $window.resize(onResize);
        onResize();
    }

    function onResize() {
        this.height = $window.height();
        this.width = $window.width();
    }

    return this;

})();