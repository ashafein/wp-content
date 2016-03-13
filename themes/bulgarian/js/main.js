var cityRegionsCache = new Array();
var countryCache = new Array();// cache for the runned queries
var regionCache = new Array();// cache for the runned queries
var cityCache = new Array();// cache for the runned queries
var clickable = true;


function refineSearch() {
    var el = $('.advanced_search_link a');
    if(el.length == 0)
    {
        el = $('.advanced_search').parent('a');
    }
    
    if(el.length > 0)
    {
        window.location = el.attr('href');
    }
}
function searchByLocation(countryId, regionId) {
    $('#search_form #cnt_id').val(countryId);
    $('#search_form #reg_id').val(regionId);
    $('#search_form').submit();
}
function searchByPropertyGroup(group) {
    $('#search_form #drop-property_type').find('input').each(function() {
        if ($(this).attr("rel") == 'property_type' + group) {
            $(this).attr("checked", "checked");
        }
        else {
            $(this).attr("checked", null);
        }
    });
    $('#search_form').submit();
}
function searchByPropertyType(type) {
    $('#search_form #drop-search_tags').find('input').each(function() {
        if ($(this).attr("id") == 'search_tags-' + type) {
            $(this).attr("checked", "checked");
        } else {
            $(this).attr("checked", null);
        }
    });
    $('#search_form').submit();
}
function searchByPrice(priceFrom, priceTo, rentSale) {
    if (rentSale == 1) {
        suffix = '_rent';
    } else {
        suffix = '';
    }
    $('#search_form #pricefrom' + suffix).val(priceFrom);
    $('#search_form #priceto' + suffix).val(priceTo);
    $('#search_form').submit();
}
function updatechosen(){
    $(".fselect").each(function(i,obj){
        var relobj=$(this).attr("rel")+" :checked";
        var leng=$(relobj).length;
        $(this).text((leng)?translate("Выбрано")+" "+(leng):$(this).attr("any"));
        $($(this).attr("rel")).bind("click",function(e){
            // updatechosen();
            e.stopPropagation();
        });

    });
}
function fselectclick(e,obj){

    rel=$(obj).attr("rel");
    if($(rel+" :visible").length){
        $(rel).hide();
    }else{
        $(rel).show();
    }
    $(".fselect:not([rel="+rel+"])").each(function(i,obj){
        rel=$(this).attr("rel");
        $(rel).hide();
    });
    // updatechosen();
    e.stopPropagation();
}
function buildRegion(msg,value){
    $("div#filter_city div.box_form_1").html("");
    $.each(msg,function (k,x){
        if(k){
            $("div#filter_region").append(
                '<label class="checkbox" for="region_id-'+k+'" rel="'+value+'"><input type="checkbox" class="checkbox for_select_3" name="region_id['+k+']" id="region_id-'+k+'" value="'+k+'">'+x+'</label>'
                );
        }
    });
}
function buildCity(msg,value){
    $.each(msg,function (k,x){
        if(k){
            $("div#checkboxes_city").append(
                '<label class="checkbox" for="city_id-'+k+'" rel="'+value+'"><input type="checkbox" class="checkbox for_select_4" name="city_id['+k+']" id="city_id-'+k+'" value="'+k+'">'+x+'</label>'
                );
        }
    });
}
function buildDistrict(msg,value){

    $.each(msg,function (k,x){
        if(k){
            $("div#checkboxes_raion").append(
                '<label class="checkbox" for="dst_id-'+k+'" rel="'+value+'"><input type="checkbox" class="checkbox for_select_5" name="dst_id['+k+']" id="dst_id-'+k+'" value="'+k+'">'+x+'</label>'
                );
        }
    });
}
function weatherWidgetElements(cityWeatherIndex, elements) {
    elements.each(function (index) {
        if (index === cityWeatherIndex) {
            $(this).show("slide", {direction: 'right'}, 500);
        }
    });
}

$(document).ready(function() {
    
    
    //mjpeg stream
    $(".onlinecam").click(function(){
        var url = $(this).attr('rel');
        if(url != undefined)
        {
            $('<a href="'+url+'"></a>').fancybox({
                'autoSize' : false,
                'fitToView' : false,
                'transitionIn' : 'none',
                'transitionOut' : 'none',
                'overlayShow'	: true,
                'type' : 'iframe',
                'width': 640,
                'height' : 390,
                'titleShow':false,
                'scrolling'   : 'no'
            }).click();
        }
        return false;
    });
    
    
    $("div#country").click(function(event) {
        $("div.country").toggleClass("hidden");
        event.stopPropagation();
    });
    //fix for CkEditor old verison
    $('.cms_content img').each(function(){
        var marginX = $(this).attr("hspace");
        var marginY = $(this).attr("vspace");
        marginX = parseInt(marginX);
        marginY = parseInt(marginY);
        if(!isNaN(marginX)){
            if(marginX>0){
                $(this).css({
                    "margin-left":marginX+"px",
                    "margin-right":marginX+"px"
                }).removeAttr("hspace");
            }
        }
        if(!isNaN(marginY)){
            if(marginY>0){
                $(this).css({
                    "margin-top":marginY+"px",
                    "margin-bottom":marginY+"px"
                }).removeAttr("vspace");;
            }
        }
    });
    
    //datepicker
    jQuery.datepicker._gotoToday = function(id){
        var target=$(id);
        var today = new Date();
        var day =today.getDate();
        var month = today.getMonth()+1;
        var year=today.getFullYear();
        var buf=(day<10?"0"+day:day)+"/"+(month<10?"0"+month:month)+"/"+year;
        $(target).attr("value",buf);
        this._hideDatepicker();
        return true;
    };
    var options = {
        "dateFormat" : "dd/mm/yy",
        changeYear : true,
        showButtonPanel : true,
        changeMonth : true,
        "duration" : "fast"
    }; 
    if($(".datepicker").length > 0)
    {
        $(".datepicker").datepicker(options);
    }
    
    
    
    
    //ajax loading box;
    $('#filter_country_region').before('<div id="bruce"></div>');
    $('body').ajaxStart(function(){
        $('.advanced #bruce').show();
        $('#filter_region input, #checkboxes_city input, #checkboxes_raion input').attr('disabled','disabled');
    });
    $('body').ajaxStop(function(){
        $('.advanced #bruce').hide();
        $('#filter_region input, #checkboxes_city input, #checkboxes_raion input').removeAttr('disabled');
    });
    updatechosen();

    $("select#country_id").live("change",function(){
        var value = this.value;
        $('div#filter_region .checkbox').each(function(i,m){
            $(this).removeAttr('checked');
            $(this).change();
        });
        $('div#filter_region .checkbox').remove();

        if (!$(countryCache[value]).length){
            $.ajax({
                type: "GET",
                url:"/ajaxfeeds/dmregion/q/"+value,
                dataType: 'json',
                success: function(msg){
                    buildRegion(msg,value);
                },
                error:function(msg){
                //                    alert('connection lost');
                }
            });
        }else{
            $('div#filter_region .checkbox').removeAttr('checked');
            $('div#filter_region .checkbox').change();
            buildRegion(countryCache[value],value);
        }
    });



    $("div#filter_region input.checkbox").live("change",function(){
        var value = this.value;
        if($(this).attr('checked')){

            if (!$(regionCache[value]).length){
                $.ajax({
                    type: "GET",
                    url:"/ajaxfeeds/dmcity/q/"+value,
                    dataType: 'json',
                    success: function(msg){
                        // alert();
                        regionCache[value] = msg;
                        buildCity(msg,value);
                    },
                    error:function(msg){
                    //                        alert('connection lost');
                    }
                });
            }else{
                buildCity(regionCache[value],value);
            }
        }else{
            //uncheck remove
            $('div#checkboxes_city label[rel='+value+'] input').removeAttr('checked');
            $('div#checkboxes_city label[rel='+value+'] input').change();
            $('div#checkboxes_city label[rel='+value+']').remove();
        /*if(regionCache[value]){
                $.each(regionCache[value],function(k,x){
                        //force district removal
                        $('#city_id-'+k).removeAttr('checked');
                        $('#city_id-'+k).change();
                        $('[for=city_id-'+k+']').remove();

                })
            }*/


        }
    });

    $("div#filter_city input.checkbox").live("change",function(){
        var value = this.value;
        if($(this).attr('checked')){
            if (!$(cityCache[value]).length){
                $.ajax({
                    type: "GET",
                    url:"/ajaxfeeds/dmdistrict/q/"+value,
                    dataType: 'json',
                    success: function(msg){
                        cityCache[value]=msg;
                        buildDistrict(msg,value);
                    },
                    error:function(msg){
                    //                        alert('connection lost');
                    }
                });
            }else{
                buildDistrict(cityCache[value],value);
            }
        }else{
            //uncheck remove
            // $('div#checkboxes_raion label[rel='+value+'] input').removeAttr('checked');
            // $('div#checkboxes_raion label[rel='+value+'] input').change();
            $('div#checkboxes_raion label[rel='+value+']').remove();
        /*if(cityCache[value]){
                $.each(cityCache[value],function(k,x){
                        $('div#checkboxes_raion [for=dst_id-'+k+']').remove();
                })
            }*/
        }
    });

    // $("select#country_id").change();

    $(".fselect").bind("mouseenter mouseleave", function() {
        $(this).toggleClass("hover");
    });

    $(".fselect").bind("mousedown mouseup", function() {
        $(this).toggleClass("pressed");
    });

    $(".fselect").bind("click",function(e){
        fselectclick(e,this)
    });

    $("a.check").bind("click", function (e){
        $($(this).attr("rel")+" input").each(function (){
            this.checked=true;
        });
        e.stopPropagation();
        updatechosen();
        return false;
    });

    $("a.uncheck").bind("click", function (e){
        $($(this).attr("rel")+" input").each(function (){
            this.checked=false;
        });
        e.stopPropagation();
        updatechosen();
        return false;
    });


    $(".wrapper").bind("click",function(e){
        updatechosen();
        e.stopPropagation();
    });
    $(".dropdown").bind("click",function(e){
        updatechosen();
        e.stopPropagation();
    });

    $(document.body).bind("click",function(){
        $(".fselect").each(function(i,obj){
            rel=$(this).attr("rel");
            $(rel).hide();
        });
        updatechosen();
    });


    $(".button_advanced_search,#link_advanced_search").bind("click", function() {
        $("#property_filter").toggleClass("advanced").toggleClass("normal");
        $("#property_filter.advanced .wrapper:not(:visible)").show();
        $("#property_filter.normal .wrapper:visible").hide();
        $(".button_advanced_search").toggleClass("button_close");
        $("#link_advanced_search").toggleClass("link_close");
        return false;
    });

    $("#advanced_search").bind("click", function() {
        $("#normalsearch").attr('checked','checked');

    });
    $("#results").bind("change",function(){
        window.location = this.value;
    });
    // submit form on Change event of select
    $("select.autosubmit").bind("change",function(){
        var test = $(this.form).find("button[name=_submit]");
        if(test.length > 0){
            test.click();
        }
        else{
            this.form.submit();
        }
    });


    $("#pricefslave").bind("change", function() {
        $("#pricefmaster")[0].selectedIndex = this.selectedIndex;
    });

    $("#pricefmaster").bind("change", function() {
        $("#pricefslave")[0].selectedIndex = this.selectedIndex;
    });

    $("#pricetslave").bind("change", function() {
        $("#pricetmaster")[0].selectedIndex = this.selectedIndex;
    });
    $("#pricetmaster").bind("change", function() {
        $("#pricetslave")[0].selectedIndex = this.selectedIndex;
    });

    $("input.check_property").bind("click", function() {
        $("#select_type").hide();
    });

    // Agents
    $("#off_radio").bind("change", function() {
        $("#prop_countries").hide();
        $("#off_countries").show();
    });

    $("#prop_radio").bind("change", function() {
        $("#off_countries").hide();
        $("#prop_countries").show();
    });

    if($("#rent_sale").val()==1) {
        $("#filter_rent_box").show();
        $("#filter_sale_box").hide();
    }else{
        $("#filter_rent_box").hide();
        $("#filter_sale_box").show();
    }

    $("#rent_sale").bind('change',function (){
        if($("#rent_sale").val()==1) {
            $("#filter_rent_box").show();
            $("#filter_sale_box").hide();
        }else{
            $("#filter_rent_box").hide();
            $("#filter_sale_box").show();
        }
    });

    $("a.select_all").bind("click", function() {
        var rel = this.rel;
        var state = ($("#"+rel.toString()+" input:not(:checked)").length>0)?true:false;
        $("#"+rel.toString()+" input").each( function() {
            this.checked = state;
            $(this).change();
        });
    // da se vika samo za regionite inache bugva
    /*if(rel=="for_select_3"){
            afterAjaxCallBack();
        }*/
    });

    $("a.select_type").bind("click", function() {
        var rel=$(this).attr('rel');
        var state = ($("input[rel="+rel.toString()+"]:not(:checked)").length>0)?true:false;
        $('input[rel='+rel+']').each(function (){
            this.checked = state;
        });
    });
    $("a.select_type").disableSelection();
    $("a.select_all").disableSelection();


    $(".fancybox").fancybox({
        'overlayShow' : true,
        'width'         : 740,
        'height'        : 620,
        'padding'       : 20,
        'autoSize': false,
        'fitToView' : false
    });

    $(".help").tooltip({
        // use div.tooltip as our tooltip
        // tip: '.tooltip',

        // use the fade effect instead of the default
        effect: 'fade',

        // make fadeOutSpeed similar to the browser's default
        fadeOutSpeed: 50,

        // the time before the tooltip is shown
        predelay: 200

    // tweak the position
    // position: "bottom center",
    // offset: [-50, -80]
    });
    $(".fancybox_iframe").fancybox({
        'autoSize' : false,
        'fitToView' : false,
        'transitionIn' : 'none',
        'transitionOut' : 'none',
        'overlayShow'	: true,
        'type' : 'iframe',
        beforeShow : function() {
            this.height = $('.fancybox-iframe').contents().find('html').height() + 20;
        }
    });

    $("span.label_optional").each(function(){
        $(this).parent().find("label.optional").append(this);
    });

    $(".prop_stats_total").tooltip({
        // use the fade effect instead of the default
        //effect: 'fade',

        // make fadeOutSpeed similar to the browser's default
        fadeOutSpeed: 50,

        // the time before the tooltip is shown
        predelay: 200,

        // tweak the position
        position: "center left",
        offset: [0, -30]
    });


    // currency

    $("select.currency").change(function() {
        var currency = this.value;
        $.ajax({
            type: "GET",
            url: "/ajaxfeeds/currency/currency/" + currency,
            success: function(obj) {
                location.reload();
            }
        });
    });

    var priceElements = $("select#pricefslave , select#pricetslave");
    function showLoading(jqueryCollection,parent){
        jqueryCollection.css("cssText","display: none !important");
        $(parent).append('<span id="rent-sale-ajax-loader"><img src="/images/load/ajax-loader-rentsalebox.gif" /></span>');
    }
    function hideLoading(jqueryCollection){
        jqueryCollection.css("cssText","display: inline !important");
        $("#rent-sale-ajax-loader").remove();
    }
    function changeRentSaleBox(jsonResponse){
        $("div#filter_price h3").html(jsonResponse['label']);
        priceElements.each(function(){
            var firstOption = $(this.options[0]).clone();
            $(this).html("");
            $(this).append(firstOption);
            var appendString = "";
            $.each(jsonResponse['prices'],function(key,value){
                appendString +='<option value="'+key+'">'+value+'</option>';
            });
            $(this).append(appendString);
            hideLoading(priceElements);
        });
    }
    var jsonCache = new Array();
    $("select#rent_sale").bind("change",function(){
        var value = parseInt(this.value);
        if(value==0){
            return;
        }
        showLoading(priceElements, "#filter_price");
        if(jsonCache[value]===undefined){
            $.ajax({
                type: "GET",
                url: "/ajaxfeeds/prices/type/" + value,
                dataType : "json",
                success: function(jsonResponse) {
                    jsonCache[value] = jsonResponse;
                    changeRentSaleBox(jsonCache[value]);
                }
            });
        }else{
            changeRentSaleBox(jsonCache[value]);
        }

    });


    $(".offer_video").fancybox({
        'type' : 'iframe',
        'autoSize'     :   false,
        'fitToView' : false,
        'transitionIn'  :   'none',
        'transitionOut' :   'none',
        'overlayShow'	:   true,
        beforeShow : function() {
            if ( $('.fancybox-iframe').contents().find('iframe').length !=0 && $('.fancybox-iframe').contents().find('#captcha').length == '0') // if it's video
                {
                    $('.fancybox-skin').css('padding', '0');
                    this.width = $('.fancybox-iframe').contents().find('iframe').width() + 20;
                    this.height = $('.fancybox-iframe').contents().find('iframe').height() + 20;
                }
        }
    });
    
    $('.offer_video.request_video').fancybox({
        'type' : 'iframe',
        'autoSize'     :   false,
        'fitToView' : false,
        'transitionIn'  :   'none',
        'transitionOut' :   'none',
        'overlayShow'	:   true
    });
    
    $(".offer_onlinecam").fancybox({
        'transitionIn' : 'none',
        'transitionOut' : 'none',
        'overlayShow'	: true,
        'type' : 'iframe',
        'width': 640,
        'height' : 390,
        'fitToView'   : false,
        'autoSize'    : false
    });
    
    /**
     * Conditional JS code comments bellow.
     */
    
    var IE = (function () {
        "use strict";

        var ret, isTheBrowser,
            actualVersion,
            jscriptMap, jscriptVersion;

        isTheBrowser = false;
        jscriptMap = {
            "5.5": "5.5",
            "5.6": "6",
            "5.7": "7",
            "5.8": "8",
            "9": "9",
            "10": "10"
        };
        jscriptVersion = new Function("/*@cc_on return @_jscript_version; @*/")();

        if (jscriptVersion !== undefined) {
            isTheBrowser = true;
            actualVersion = jscriptMap[jscriptVersion];
        }

        ret = {
            isTheBrowser: isTheBrowser,
            actualVersion: actualVersion
        };

        return ret.isTheBrowser;
    }());
    
    if( IE == false )
    {
        var IE11 = (function () {
            return !!navigator.userAgent.match(/Trident.*rv\:11\./);
        }());
        window.IE11 = IE11;
        window.IE = IE;
        IE = IE11;
    }
    
    $(".offer .offer_media a.offer_photo").on( 'click', function( event )
    {
        event = $.event.fix( event );
        event.preventDefault();
        event.stopPropagation();
        
        var parent = $( event.target ).parent();
        while( !$( parent ).hasClass('offer') )
        {
            parent = $( parent ).parent(); 
        }
        
        var id = parseInt( event.target.getAttribute('data-src'), 10 );
        
        $.ajax({
            dataType: 'json',
            url: '/gallery/property-pics/id/' + id,
            success: function( data )
            {
                var images = [];
                var path = data['path'] || '';
                var title = data['type'] + " " + data['title'] || '';
                
                for( var x in data[ 'images' ] )
                {
                    images.push({ 
                        src: path + data[ 'images' ][ x ][ 'dmbpp_filename' ]
                        //titleSrc: data[ 'images' ][ x ][ 'dmbpp_label' ]
                        //titleSrc : 'ANTI KONTI TEST no title'
                    });
                }
                
                
                $.magnificPopup.open({
                    
                    closeOnContentClick: false,
                    closeBtnInside: false,
                    closeOnBgClick: ( IE ) ? false : true,
                    mainClass: 'mfp-image',
                    items : images,
                    type : 'image',
                    callbacks : {
                        open: function()
                        {
                            var str = '<ul>';
                            if( parent.find( '.offer_hidden_data .title_hidden_data' ).html() != null )
                            {
                                str += '<li>';
                                str += '<img src="/js/apple-gallery/img/tipimot.png" style="display: inline-block;" />';
                                str += parent.find( '.offer_hidden_data .title_hidden_data' ).html().trim()
                                str += '</li>';
                            }
                            else if( data['title'] != '' )
                            {
                                str += '<li>';
                                str += '<img src="/js/apple-gallery/img/tipimot.png" style="display: inline-block;" />';
                                str += data['title'];
                                str += '</li>';
                            }

                            if( parent.find('.offer_hidden_data .location_hidden_data' ).html() != null )
                            {
                                str += '<li style="margin-left: 5px; margin-right: 5px;" > | </li>';
                                str += '<li>';
                                str += '<img src="/js/apple-gallery/img/location.png" style="display: inline-block; margin-right: 0px;" />';
                                str += parent.find('.offer_hidden_data .location_hidden_data' ).html().trim();
                                str += '</li>';
                            }

                            if( parent.find( '.offer_hidden_data .price_hidden_data' ).html != null && parseInt( data['hidePrice'], 10 ) == 0 )
                            {
                                str += '<li style="margin-left: 5px; margin-right: 5px;" > | </li>';

                                str += "<li>"
                                    str += '<img src="/js/apple-gallery/img/price-tag.png" style="display: inline-block;" />';
                                    str += parent.find( '.offer_hidden_data .price_hidden_data' ).text().trim();
                                str += '</li>';
                            }
                            
                
                            if( parent.find( '.offer_hidden_data .area_hidden_data' ).html() != null )
                            {
                                str += '<li style="margin-left: 5px; margin-right: 5px;" > | </li>';

                                str += '<li>';
                                    str += '<img src="/js/apple-gallery/img/ruler-32.png" style="display: inline-block;" />';
                                    str += parent.find( '.offer_hidden_data .area_hidden_data' ).html().trim();
                                str += '</li>';
                            }

                            str += "</ul>";

                            $( '.mfp-topTitle' ).html( str );
                        }
                    },
                    image: {
                        markup: '<div class="mfp-figure">'+
                        '<div class="mfp-close"></div>'+
                        '<div class="mfp-topTitle"></div>'+ 
                        '<div class="mfp-img"></div>'+
                        '<div class="mfp-bottom-bar">'+
                          '<div class="mfp-title"></div>'+
                          '<div class="mfp-counter"></div>'+
                        '</div>'+
                        '</div>',
                        titleSrc: function( item )
                        {
                            var wrapper = document.createElement( 'div' );
                                wrapper.style.overflow = 'hidden';

                            var galleria = data[ 'images' ];

                            var elementWidth = 100;
                            var elementsPerPage = Math.floor( 750 / elementWidth );
                            var totWidth = galleria.length * elementWidth;
                            var page = Math.floor( $.magnificPopup.instance.index / elementsPerPage );
                            var left = page * elementWidth * elementsPerPage * -1;
                            var timeToAnimate = 450;
                            
                            var ul = document.createElement( 'ul' );
                                ul.style.width = totWidth + 'px';
                                ul.style.marginTop = '25px';
                                ul.style.height = '65px';


                            var prev = document.createElement( 'span' ),
                                next = document.createElement( 'span' );

                                prev.style.top = '41px';
                                prev.style.position = 'absolute';
                                prev.style.left = '-32px';

                                next.style.top = '41px';
                                next.style.position = 'absolute';
                                next.style.left = $( $.magnificPopup.instance.contentContainer[0] ).width() + 'px';
                                next.style.left = 800 + 'px';

                            var img = document.createElement( 'img' );
                                img.src = '/js/apple-gallery/img/back-32-white.png';
                                prev.appendChild( img );

                            var img = document.createElement( 'img' );
                                img.src = '/js/apple-gallery/img/forward-32-white.png';
                                next.appendChild( img );

                                prev.onclick = function(){
                                    if( page > 0 )
                                    {
                                        page--;
                                        var left = page * elementWidth * elementsPerPage * -1;
                                        $( '.mfp-title div ul li' ).stop().animate({left: left + 'px'}, timeToAnimate);
                                    }
                                };

                                next.onclick = function(){
                                    if( page < Math.floor( galleria.length / elementsPerPage ) )
                                    {
                                        page++;
                                        var left = page * elementWidth * elementsPerPage * -1;
                                        $( '.mfp-title div ul li' ).stop().animate({left: left + 'px'}, timeToAnimate);
                                    }
                                };

                            prev.className = 'arrow arrow-left';
                            next.className = 'arrow arrow-right';

                            wrapper.appendChild( prev );
                            wrapper.appendChild( next );

                            for( var i = 0, len = galleria.length; i < len; i++ )
                            {
                                var pattern = galleria[ i ].dmbpp_filename;
                                if( $.magnificPopup.instance.index == i )
                                {
                                    var label = document.createElement( 'div' );
                                        label.appendChild( document.createTextNode( galleria[ i ].dmbpp_label ) );
                                    wrapper.appendChild( label );
                                    var isActive = 'currentThumb';

                                    if( galleria[ i ].dmbpp_label != '' )
                                    {
                                        ul.style.marginTop = '12px';
                                    }

                                } else {
                                    var isActive = '';
                                }


                                var li = document.createElement( 'li' );
                                    li.style.width = elementWidth + 'px';
                                    li.style.left = left + 'px';
                                    li.style.position = 'relative';

                                var img = document.createElement( 'img' );
                                    img.className = isActive;
                                    img.setAttribute( 'onclick', '$.magnificPopup.instance.goTo( ' + i + ' );');
                                    img.style.width = '80px';
                                    img.style.height = '60px';
                                    img.style.margin = 'auto';
                                    if( typeof galleria[ i ].thumb != 'undefined' )
                                    {
                                        img.src = galleria[ i ].thumb;
                                    } 
                                    else {
                                        img.src = path + 't_' + galleria[ i ].dmbpp_filename;
                                    }

                                li.appendChild( img );
                                ul.appendChild( li );
                            }
                            wrapper.appendChild( ul );
                            return wrapper;
                        },
                        cursor: 'mfp-zoom-out-cur', // Class that adds zoom cursor, will be added to body. Set to null to disable zoom out cursor. 
                    },
                    gallery : {
                        enabled : true
                    }
                }, 0);
            }
        }); 
    });


    // hack za property/show
    var propShowLink = $("#main_navigation a.prop_nav_hide_me");
    if(propShowLink.length > 0)
    {
        var parentLi = propShowLink.parent();
        if(parentLi.parent().find("li").length == 1)
        {
            // Ако има само една статия - имота, скрива целия ul
            parentLi.parent().css("display","none");
        }
        else
        {
            // В противен случай скрива само li
            parentLi.css("display","none");
        }
    }

    //captcha refresher :D
    $("body").on("click",'span.button_refresh',function(){
        refreshCaptcha($(this));
    });
    //sort menus
    $(".sort_menu").hover(
        function() {
            $("li.sort_menu_item").not(".selected").show();
        },
        function() {
            $("li.sort_menu_item").not(".selected").hide();
        }
        );
    $(".sort_menu_item").hover(
        function() {
            $(this).addClass("sort_hover");
        },
        function() {
            $(this).removeClass("sort_hover");
        }
        );

    //footer links hacks 
    if($('.footer-links').length>0)
    {
        $('#footer-links-botton').live('click',function(){
            $('.footer-links').css({
                'top': $('#footer-links-botton').position().top-385 ,
                'left' : $('#footer-links-botton').position().left+20,
                'display':'block'
            });
            $('body').bind('click',function(){
                $('.footer-links').css({
                    'display':'none'
                });
            });
        });

    }else{
        $('#footer-links-botton').css({
            'display':'none'
        });
    }

    //hackerii za office kartite
    $(".gmap").fancybox({
        'autoSize'     :   false,
        'transitionIn'  :   'none',
        'transitionOut' :   'none',
        'overlayShow'	:   true,
        'titleShow'     :   false,
        'titlePosition'	:   'inside',
        beforeLoad:function(){
            var selectedArray = this.element;
            var latitude = parseFloat(selectedArray.attr("latitude"));
            var longitude = parseFloat(selectedArray.attr("longitude"));
            var zoom = parseFloat(selectedArray.attr("zoom"));
            
            if( ( isNaN(latitude) || latitude == 0 ) || ( isNaN(longitude) || longitude == 0) || ( isNaN(zoom) || zoom == 0 ) ){
                latitude = 42.61903985005047;
                longitude = 25.49279912660293;
                zoom = 7;
            }

            var mapCheck = $("div#map");

            if(mapCheck.length > 0){
                marker = new google.maps.Marker({
                    map:map,
                    position:new google.maps.LatLng(latitude, longitude),
                    draggable: false
                });
                
                map.setCenter(new google.maps.LatLng(latitude, longitude), zoom);
            }
            else{
                $("div#wrapper_gmap").append('<div id="map" style="width: 500px; height: 400px"></div>');
                loadMap(latitude, longitude, zoom, latitude, longitude, false);
            }

            $("#wrapper_gmap").removeClass("hidden");
        },
        afterClose:function(){
            $("#wrapper_gmap").addClass("hidden");
        }
    });
    $("a#broker_question").fancybox({
        'transitionIn' : 'none',
        'transitionOut' : 'none',
        'overlayShow'	: true,
        'type' : 'iframe',
        'titleShow':false,
        'width':650,
        'scrolling':'no',
        'autoSize': true,
        'fitToView' : false,
        'hideOnOverlayClick': false,
        'hideOnContentClick': false,
        'enableEscapeButton': false,
        'showCloseButton':true
    })
    
    // fix from to in form
    var fromToSearchFields = {
        'pricefrom':'priceto',
        'areafrom':'areato',
        'floorfrom':'floorto',
        'bfloorsfrom':'bfloorsto',
        'roomsfrom':'roomsto',
        'bedroomsfrom':'bedroomsto',
        'bathroomsfrom':'bathroomsto'
    };
    $.each(fromToSearchFields, function(key,value){
        $('select[name='+key+']').on("change",function(){
            var tmp = this.selectedIndex; 
            var counter = 0;
            $('select[name='+value+'] option').each(function(){
                if(tmp && counter && counter<tmp){
                    $(this).css("display","none");
                    $(this).attr("disabled", "disabled");
                }
                else{
                    $(this).css("display","block");
                    $(this).removeAttr("disabled");
                }
                counter++;
            });
        });
        $('select[name='+value+']').on("change",function(){
            var tmp = this.selectedIndex; 
            var counter = 0;
            $('select[name='+key+'] option').each(function(){
                if(tmp && counter && counter>tmp){
                    $(this).css("display","none");
                    $(this).attr("disabled", "disabled");
                }
                else{
                    $(this).css("display","block");
                    $(this).removeAttr("disabled");
                }
                counter++;
            });
        });
        $('select[name='+key+']').change();
        $('select[name='+value+']').change();
    });
    $("form.form_2").bind("submit", function() {
        var submitted = $(this).data("submitted");
        if (!submitted)
        {
            $(this).data("submitted", "1");
            return true;
        }
        return false;
    });
    
    /**
     * Weather Widget
     * @type 
     */

    var cityWeatherIndex = 0;
    var elements = $('.weather_main_wrapper');
    var count = elements.length;
    var weatherMaxAttempts = false;
    $('.weather_main_wrapper').hide();
    weatherWidgetElements(0, elements);
    
    if (count >= 2) {
        setInterval(function () {
            $('.weather_main_wrapper').hide();
            if (cityWeatherIndex === (count - 1)) {
                weatherMaxAttempts = true;
            } else if (cityWeatherIndex === 0) {
                weatherMaxAttempts = false;
            }

            if (weatherMaxAttempts) {
                cityWeatherIndex = cityWeatherIndex - 1;
                weatherWidgetElements(cityWeatherIndex, elements);
            } else {
                cityWeatherIndex = cityWeatherIndex + 1;
                weatherWidgetElements(cityWeatherIndex, elements);
            }
        }, 5000);
    }
    /**
     * End of Weather Widget
     */

     $('#languages_select').on('click', '.current_language', function(){
        $('#languages_select .languages_dropdown').toggleClass('hidden');
    });

    $(".header_request_call a").fancybox({
        'transitionIn': 'none',
        'transitionOut': 'none',
        'overlayShow': true,
        'type': 'iframe',
        'titleShow': false,
        'width': 650,
        'scrolling': 'no',
        'autoSize': true,
        'fitToView' : false,
        'hideOnOverlayClick': false,
        'hideOnContentClick': false,
        'enableEscapeButton': false,
        'showCloseButton': true
    });
    
    $(".fancybox-banner").fancybox({
        'transitionIn' : 'none',
        'transitionOut' : 'none',
        'overlayShow'	: true,
        'type' : 'iframe',
        'titleShow':false,
        'scrolling':'no',
        'autoSize': true,
        'fitToView' : false,
        'hideOnOverlayClick': false,
        'hideOnContentClick': false,
        'enableEscapeButton': false,
        'showCloseButton':true,
        beforeShow: function(){
            var frameWidth = $('.fancybox-iframe').contents().find('html').find('body').innerWidth();
            var frameHeight = $('.fancybox-iframe').contents().find('html').find('body').innerHeight();
            var selectorsThatOverlapWidth = [ '.landing_page_wrapper', '#wrapper' ];

            for ( var index in selectorsThatOverlapWidth ) {
                var widthElementSelector = selectorsThatOverlapWidth[index];
                if ( $('.fancybox-iframe').contents().find( widthElementSelector ).length > 0 ) {
                    frameWidth = $('.fancybox-iframe').contents().find( widthElementSelector ).width() + 0;
                    frameHeight = $('.fancybox-iframe').contents().find( widthElementSelector ).height() + 0;
                }
            }
            this.height = frameHeight;
            this.width = frameWidth;
        }
    })

    
    $('.cms_landing').click(function(){
        var landingId = $(this).attr('href');
        landingId = landingId.replace('/landing/page/id/','');
        landingId = landingId.replace('/','');
        var url = encodeURIComponent(window.location.href);
        $('<a href="/landing/page/id/'+landingId+'/?url='+url+'"></a>').fancybox({
            'transitionIn': 'none',
            'transitionOut': 'none',
            'overlayShow': true,
            'type': 'iframe',
            'titleShow': false,
            'scrolling': 'no',
            'autoSize': false,
            'fitToView': false,
            'hideOnOverlayClick': false,
            'hideOnContentClick': false,
            'enableEscapeButton': false,
            'showCloseButton': true,
            'beforeShow': function () {
                var frameWidth = $( '.fancybox-iframe' ).contents().find( 'html' ).find( 'body' ).innerWidth();
                var frameHeight = $( '.fancybox-iframe' ).contents().find( 'html' ).find( 'body' ).innerHeight();
                var selectorsThatOverlapWidth = [ '.landing_page_wrapper', '#wrapper' ];

                for ( var index in selectorsThatOverlapWidth ) {
                    var widthElementSelector = selectorsThatOverlapWidth[index];
                    if ( $( '.fancybox-iframe' ).contents().find( widthElementSelector ).length > 0 ) {
                        frameWidth = $( '.fancybox-iframe' ).contents().find( widthElementSelector ).width();
                        frameHeight = $( '.fancybox-iframe' ).contents().find( widthElementSelector ).height();
                    }
                }
                this.height = frameHeight + 17;
                this.width = frameWidth + 25;
            }
        }).click();
        return false;
    });

    if ($('.widgetFacebookPagePlugin').length > 0) {
        var fb_plugin_shown = false;
        $('.show_fb_plugin').on('click', function () {
            if (fb_plugin_shown) {
                $('.fb_plugin').hide('slow');
                fb_plugin_shown = false;
            } else if (!fb_plugin_shown) {
                $('.fb_plugin').show('slow');
                $('.fb_plugin').css('display', 'inline-block');
                fb_plugin_shown = true;
            }

        });
    }
});
