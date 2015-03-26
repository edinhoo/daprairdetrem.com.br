var Local = (function($) 
{    
    var 
        mediaContainer = $('.medias ul'),
        
        
        initMasonry = function() 
        {
            mediaContainer.imagesLoaded(function() {
                console.log('images loaded');
                $(mediaContainer).masonry({
                    gutter: 20,
                    columnWidth: 340
                });
            });
        },
        
        initLightbox = function()
        {
            mediaContainer.find('.item').featherlightGallery({
                closeIcon: '<img src="img/svg/lightbox-close.svg" />',
                nextIcon: '<img src="img/svg/lightbox-arrow.svg" class="arrow" />',
                previousIcon: '<img src="img/svg/lightbox-arrow.svg" class="arrow voltar" />'
            });
        },
        
        setup = function() 
        {
            initMasonry();
            initLightbox();
        };
    
    
    $(document).ready(function() {
        setup();    
    });
    
    return 
    {
        refresh: initMasonry
    };
    
})(jQuery);