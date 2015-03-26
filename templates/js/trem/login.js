var Login = (function() {

    // public

    this.show = show;


    // private

    var $body = $("body");
    var login = $("#login");


    setup();

    function setup() {
        login.click(onClick);
    }

    function onClick(e) {
        if (e.target == login[0]) {
            hide();
        }
    }

    function show() {
        login.show();
    }

    function hide() {
        login.hide();
    }

    return this;

})();