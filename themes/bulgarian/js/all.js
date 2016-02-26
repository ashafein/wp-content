/**
 * Created by vredian on 11.02.2016.
 */

$('.realty-head').popover({
    trigger: 'hover',
    animation: 'show',
    placement: 'top',
    html: '<div class="popover" role="tooltip"><div class="arrow"></div><div class="popover-content"></div></div>'

});




/* Including lightslider */

$(document).ready(function() {
    $('#productGallery').lightSlider({
        gallery:true,
        item:1,
        loop:true,
        thumbItem:4,
        slideMargin:10,
        controls: false,
        enableDrag: false,
        currentPagerPosition:'center',
        onSliderLoad: function(el) {
            el.lightGallery({
                selector: '#productGallery .lslide'
            });
        }
    });

});