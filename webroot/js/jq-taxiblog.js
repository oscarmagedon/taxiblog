(function( $ ) {
    
    //on load functions (por ejemplo layout)
    $(document).ready( function (){
        
        console.log('jq lib!');
    
        $(".modal-div").dialog({
            autoOpen: false,
            bgiframe: true,		
            modal: true,
            height: 500,
            width: 700,
            resizable: true,
            buttons : {
                'Guardar' : function(){
                    $(this).find('form').submit();
                }
            }
        });
       
        //open modal => llevar a plugin
        $(".open-modal").click(function(){		
      
            var $modalElem = $('.modal-div'),
                $btnElem   = $(this),
                $titleTxt  = $btnElem.attr('title'),
                $theHref   = $btnElem.attr('href');

            $modalElem.html('Cargando...');
            $modalElem.dialog({ title: $titleTxt });
            $modalElem.load($theHref);
            $modalElem.dialog('open');

            return false;
        });
    });
    
    //fullfill combo-field
    $.fn.comboFeeder = function (target,feedUrl)
    {
        return $(this).on("change", function( e ) {
            if ($(this).val() !== '') {
                $.ajax({
                    url      : feedUrl + '/' + $(this).val(),
                    dataType : 'json'
                }).done(function(data){
                    target.feedCombo(data);
                });    
            }
        });
    };
    
    //full fill and renew combo
    $.fn.feedCombo = function (data)
    {
        $(this).html("<option value=''>...</option>");   
        $(this).append(listToOptions(data));
        $(this).attr('disabled',false);
    };
    
    //calendar basic format MySQL
    $.fn.dateCal = function ()
    {
        $(this).datepick({ dateFormat:'yyyy-mm-dd' });
    };
    
    //calendar changes URL as first param
    $.fn.dateFilter = function (mainUrl)
    {
        $(this).datepick({
            dateFormat:'yyyy-mm-dd',
            onSelect   : function (){
                location = mainUrl + '/' + $(this).val();
            }
        });
    };
    
    //combo redirects on change
    $.fn.comboFilter = function (mainUrl)
    {
        return $(this).on("change", function( e ) {
            if ($(this).val() !== '') {
                location = mainUrl + '/' + $(this).val();    
            }
        });
    };
    
    
}( jQuery ));

//create HTML select options
/* pass to plugins
function listToOptions(options)
{
    htmlOpts = '';

    $.each(options, function (k, option){
        htmlOpts += "<option value='" + option.id + "'>" + option.name + '</option>';
    });

    return htmlOpts;
}*/
