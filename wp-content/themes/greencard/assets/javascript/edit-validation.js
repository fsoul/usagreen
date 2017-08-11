/**
 * Created by bilinskyi on 13.07.17.
 */

$(document).ready(function() {
    var lang = $('.current-lang a').attr('lang');

    $('#phone, #mobile').inputmask('phone');
    $('#birth_country, #country_resid').select2();

    var $requiredElements = $('.required').parent().siblings('input');
    $requiredElements.on('blur input', function(){
        var $submitBtn = $('input[name="save_account_details"]');
        var id = $(this).attr('id');
        var val = $(this).val();
        var errorMsg;
        var valid = true;

        switch(id){
            case 'account_email':
                var email_tpl = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;

                if(!val){
                    errorMsg = {
                        'en-US': 'This field is required.',
                        'ru-RU': 'Вы пропустили это поле.'
                    };
                    valid = false;
                }else if(!email_tpl.test(val)){
                    errorMsg = {
                        'en-US': 'Enter valid email.',
                        'ru-RU': 'Введите валидный адрес электронной почты.'
                    };
                    valid = false;
                }
                break;
            case 'account_first_name':
            case 'account_last_name':
                var fio_tpl = /^[A-z-А-я]+$/;

                if(!val){
                    errorMsg = {
                        'en-US': 'This field is required.',
                        'ru-RU': 'Вы пропустили это поле.'
                    };
                    valid = false;
                }else if(!fio_tpl.test(val)){
                    errorMsg = {
                        'en-US': 'The First/Last Name can only contain alphabetic characters.',
                        'ru-RU': 'Имя/Фамилия должны состоять из букв.'
                    };
                    valid = false;
                }
        }

        $(this).siblings('.validationError').remove();

        if(valid){
            $submitBtn.unbind();
            $(this).removeClass('validation');
            $submitBtn.attr('disabled', false);
        }else{
            var errorElem = '<p style="margin: 0;" class="validationError">' + errorMsg[lang] + '</p>';
            $(this).addClass('validation');
            $(this).after(errorElem);
            $submitBtn.attr('disabled', true);
        }
    });
});
