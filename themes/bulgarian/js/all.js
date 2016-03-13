/**
 * Created by vredian on 11.02.2016.
 */






/* Including lightslider */

$(document).ready(function() {
    $('#productGallery').lightSlider({
        gallery:true,
        item:1,
        loop:true,
        auto:true,
        thumbItem:4,
        slideMargin:10,
        controls: true,
        enableDrag: true,

        onSliderLoad: function(el) {
            el.lightGallery({
                selector: '#productGallery .lslide'
            });
        }
    });

    $('.realty-head').popover({
        trigger: 'hover',
        animation: 'show',
        placement: 'top',
        html: '<div class="popover" role="tooltip"><div class="arrow"></div><div class="popover-content"></div></div>'

    });

    $( "#header-menu" ).menu();

});