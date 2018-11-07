jQuery(document).ready(function(e) {
    "use strict";
   jQuery('#yoga-register-product').click(function(){
        var data            = jQuery('#yoga_register--form').serialize();
        var _username       = jQuery('#yoga_username').val();
        var _purchase_code  = jQuery('#yoga_purchase_code').val();
        if (_username == '' || _purchase_code =='') {
            alert('Please fill full infomation!');
            return false;
        }
        jQuery('.loader-icon').addClass('is-active');

        jQuery.ajax({
            url: ajaxurl,
            data: data,
            dataType: "HTML",
            type:"POST",
            success: function(result){
                // console.log(result);
                // jQuery('#yoga-result').html(result);
                console.log(result)
                jQuery('.loader-icon').removeClass('is-active');
                // jQuery(this).attr("disabled", false);
            }
        });

   })


});