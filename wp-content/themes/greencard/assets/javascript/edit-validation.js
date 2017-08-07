/**
 * Created by bilinskyi on 13.07.17.
 */

$(document).ready(function() {

    $('#phone, #mobile').inputmask('phone');
    $('#birth_country, #country_resid').select2();

    /*
    $('input[name="save_account_detailsa"]').click(function(e){
        var $requiredElements = $('.required').parent().siblings('input');
        var err = [];

        console.log($requiredElements);

        $requiredElements.each(function (indx, el) {
            if(!el.value){
                err.push(el);
            }
        });

        if(err.length > 0){
            // add error message after .row-breadcrumbs с ul с классом .woocommerce-error
            e.preventDefault();
        }
    });
    */
});
