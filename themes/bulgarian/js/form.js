$(document).ready(function(){
    height = $('div.main_content_center_column').height();
    $('div.simple_search_form_bottom,div.simple_search_form_top').hide();
    if(height < 200)
    {
        $('div.main_content_center_column').height(200);
    }
    $('span.adv_search_label').bind('click',function(){
        $(this).next('div').toggle();
        var current = $(this).parent().parent().children('label').attr('for');
        $('span.adv_search_label').each(function(){
            var check = $(this).parent().parent().children('label').attr('for');
            if(check != current)
            {
                $('label[for="'+check+'"]').next('div').children('div').hide()   ;
            }
        });
    });
    $('div.adv_search_form span').bind('click',function(){
        simpleAdvancedSearch();
        $('div.simple_search_form_bottom').show();
        $('div.advanced_search_wrapper').toggle();
    });
    $('div.simple_search_form_bottom span').bind('click',function(){
        simpleAdvancedSearch();
        $('div.simple_search_form_bottom').hide();
        $('div.advanced_search_wrapper').toggle();
        $(window).scrollTop(0)
    });
    $('a#edit_search').removeAttr('onclick');
    $('a#edit_search').bind('click',function(){
        simpleAdvancedSearch();
        $('div.advanced_search_wrapper').show();
        $('div.simple_search_form_bottom').show();
    });
    
    function simpleAdvancedSearch()
    {
        var searchText = $('div.adv_search_form span').html();
        var backgroundImage = $('div.adv_search_form span').css('background-image');
        var backgroundPosition = $('div.adv_search_form span').css('background-position');
        
        $('div.adv_search_form span').html($('div.simple_search_form_top span').html());
        $('div.simple_search_form_top span').html(searchText);
        
        $('div.adv_search_form span').css('background-image',$('div.simple_search_form_top span').css('background-image'));
        $('div.simple_search_form_top span').css('background-image',backgroundImage);
        
        $('div.adv_search_form span').css('background-position',$('div.simple_search_form_top span').css('background-position'));
        $('div.simple_search_form_top span').css('background-position',backgroundPosition);
    }
    var rent_sale = $('select#rent_sale').val();
    rentSale(rent_sale);
                
    $("select#rent_sale").unbind("change");
    $('select#rent_sale').bind('change',function(){
        rent_sale = $(this).val();
        rentSale(rent_sale);
    });
    $("input#search,input#adv_search_button").bind('click',function(){
        rent_sale = $('select#rent_sale').val();
        if(rent_sale == 1)
        {
            $('input.sale').each(function(){
                $(this).attr('checked',false);
            });
        }
        else
        {
            $('div.display_group_rent select').each(function(){
                $(this).val(0);
            });
            $('div.display_group_rent input').each(function(){
                $(this).attr('checked',false);
            });
        }
        $('form#search_form').submit();
                
    });
    locationsHandler();
    $('#cnt_id').bind('change',function(){
        var cnt_id = $(this).val();
        $('label[rel="'+cnt_id+'"]').show();
        var toHide = $('input.reg_id,input.cit_id,input.dst_id').parent('label[rel!="'+cnt_id+'"]');
        toHide.hide();
        toHide.children('input').attr('checked', false);
    });
    $('input.reg_id').live('change',function(){
        var reg_id = $(this).val();
        if($(this).is(':checked'))
        {
            $('label[rel="'+reg_id+'"]').show();
            $('label[rel="'+reg_id+'"]').parent().parent().parent().show();
        }
        else
        {
            $('label[rel="'+reg_id+'"]').each(function(){
                var cit_id = $(this).attr('for');
                cit_id = cit_id.split('-');
                cit_id = cit_id[1];
                $('label[rel="'+cit_id+'"]').hide();
                $('label[rel="'+cit_id+'"]').children('input').each(function(){
                    $(this).attr('checked',false);
                });
            });
            $('label[rel="'+reg_id+'"]').hide();
            $('label[rel="'+reg_id+'"]').children('input').each(function(){
                $(this).attr('checked',false);
            });
        }
        calculateTotalSelected('reg_id');
        calculateTotalSelected('cit_id');
        calculateTotalSelected('dst_id');
    });
    $('input.cit_id').live('change',function(){
                    
        var cit_id = $(this).val();
        if($(this).is(':checked'))
        {
            $('label[rel="'+cit_id+'"]').show();
            $('label[rel="'+cit_id+'"]').parent().parent().parent().show();
        }
        else
        {
            $('label[rel="'+cit_id+'"]').hide();
            $('label[rel="'+cit_id+'"]').children('input').each(function(){
                $(this).attr('checked',false);
            });
        }
        calculateTotalSelected('cit_id');
        calculateTotalSelected('dst_id');
    });
    $('input.dst_id').live('change',function(){
        calculateTotalSelected('dst_id');
    });
    calculateAllTotalSelected();
});
function rentSale(value)
{
    /**
     * 1 = Naem
     * 4 = Naem za den
     */
    if(value == 1 || value == 4)
    {
        $('select#pricefrom_rent').parent().parent().show();
        $('select#priceto_rent').parent().parent().show();
        $('select#pricefrom').parent().parent().hide();
        $('select#priceto').parent().parent().hide();
        $('input.sale').parent().parent().parent().hide();
        $('div.display_group_rent').show();
    }
    else
    {
        $('select#pricefrom').parent().parent().show();
        $('select#priceto').parent().parent().show();
        $('select#pricefrom_rent').parent().parent().hide();
        $('select#priceto_rent').parent().parent().hide();
        $('input.sale').parent().parent().parent().show();
        $('div.display_group_rent').hide();
    }
}
function searchByLocation(countryId, regionId)
{
    $('input.cnt_id').attr('checked',false);
    $('input.reg_id').attr('checked',false);
    $('input.cnt_id[value="'+countryId+'"]').attr('checked',true);
    $('input.reg_id[value="'+regionId+'"]').attr('checked',true);
    $('form#search_form').submit();
}
function locationsHandler()
{
        cnt_id = $('#cnt_id').val();
        $('label[rel="'+cnt_id+'"]').show();
        var toHide = $('input.reg_id').parent('label[rel!="'+cnt_id+'"]');
        toHide.hide();
        toHide.children('input').attr('checked', false);
    var regionsNumber = $("input.reg_id:checked").length;
    var citiesNumber = $('input.cit_id:checked').length;
    var countOfRegionsOnSelectedCountry = $('label[rel="' + cnt_id + '"]').length;
    
    if (regionsNumber > 0)
    {
        if (countOfRegionsOnSelectedCountry === 1)
        {
            $('label[for="reg_id"]').parent().hide();
        }
        $('label[for="cit_id"]').parent().show();
    }
    if (citiesNumber > 0)
    {
        $('label[for="dst_id"]').parent().show();
    }
    $('input.reg_id').each(function(){
        if(!$(this).is(':checked'))
        {
            reg_id = $(this).val();
            $('label[rel="'+reg_id+'"]').hide();
        }
    });
    $('input.cit_id').each(function(){
        if(!$(this).is(':checked'))
        {
            cit_id = $(this).val();
            $('label[rel="'+cit_id+'"]').hide();
        }
    });
    if($('.adv_search_multi_wrapper_cnt').hasClass('hidden'))
    {
        $('#rent_sale').parent().parent().attr('style', 'margin-left:0px;');
    }
}
function calculateTotalSelected(locationSelect)
{
    var br = $('input.'+locationSelect+':checked').length
    if(br!=0)
    {
        $('input.'+locationSelect).parent().parent().parent().children('span').html('Выбрано'+br);
    }
    else
    {
        $('label[for="'+locationSelect+'"]').next('div').children('span').html('Любая');
    }
}
function calculateAllTotalSelected()
{
    calculateTotalSelected('cit_id');
    calculateTotalSelected('reg_id');
    calculateTotalSelected('dst_id');
}
