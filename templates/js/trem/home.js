var Home = (function() {


    var nav = $("#home-navigation");


    setup();

    function setup() {
        W.resize(updateNavScale);
        updateNavScale();
    }

    function updateNavScale() {
        var scale = 1000;
        if (W.width/W.height > 1000/580) {
            scale = W.height/580;
        } else {
            scale = W.width/1000;
        }
        if (scale > 1) {
            scale = 1 + (scale-1)*0.5;
        }
        nav.css({
            transform: "scale("+scale+")"
        })
    }

})();