$(document).ready(function() {
    console.log('tel');
    //$('.abc .woocommerce-Button .button').unbind();
    $('#phone,#mobile').attr('type', 'tel');


    /* 	Разрешение на регистрацию при соблюдении условий
	$('.register #agree_register').click(function(event){
*/

	$('input[type="radio"].working,input[type="radio"].h_school,#birth_country').click(function(event){
		var f_line = $("input[type='radio'].working:checked").val();
		var s_line = $("input[type='radio'].h_school:checked").val();
		var birth_country = $('#birth_country option:selected').val();
		var stopcountry = 'Bangladesh,El Salvador,Hong Kong,Philippines,Brazil,Colombia,Haiti,Nigeria,Jamaica,South Korea,Canada,Dominican Republic,India,Pakistan,Vietnam,China,Mexico,Ecuador,Peru';

/*
		console.log("f_line="+f_line);
		console.log("s_line="+s_line);
		console.log("birth_country="+birth_country);
		console.log("birth_country have ="+stopcountry.indexOf(birth_country));
*/
		if((f_line =='no' && s_line =='no') || stopcountry.indexOf(birth_country) >= 0){
			$("form.register input.woocommerce-Button.button").addClass("disabled");
			$("#error-message").removeClass("hidden");
		}
		else{
			$("form.register input.woocommerce-Button.button").removeClass("disabled");
			$("#error-message").addClass("hidden");
/*			$(".register #agree_register").addClass("warning");
			event.preventDefault();
*/
		}
		
	});
	$("<div id='error-message' class='hidden'>We're sorry, but it seems that you are not able to participate in this year's Green Card lottery</div>").insertBefore("form.register input.woocommerce-Button");
  $('<div class="phone-flag"></div><div class="phone-country"></div>').insertAfter('#phone');
  $("#first_name").prop('required', true);
  $("#last_name").prop('required', true);
  $("#birth_country").prop('required', true);
  $("#country_resid").prop('required', true);
  $("#phone").prop('required', true);
  $("#mobile").prop('required', true);



/* https://jsfiddle.net/ichepurnoy/5zy10bsL/ */
/*
$('#phone').inputmask("phone", {
  onKeyValidation: function () { //show some metadata in the console
    console.log($(this).inputmask("getmetadata")["city"]);
  }
});
*/
    $('#phone,#mobile').inputmask("phone", {
            /*url: "/phone-codes/phone-codes.js",*/ /*OPTIONAL, can be set in extendAliases!*/
            onKeyValidation: function () { 
/*		console.log($(this).inputmask("getmetadata")["name_ru"]);
            	console.log($('#phone').inputmask('unmaskedvalue'));     */
                if( $('#phone').inputmask('unmaskedvalue') ) { /* we either show country only when mask is fully defined, and won't change by typing further */
                	$('.phone-country').text($(this).inputmask("getmetadata")["cd"]);
                        var countryCode = String($(this).inputmask("getmetadata")["cc"].toLowerCase()),
                        link = "https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/1.0.0/flags/4x3/"+countryCode+".svg";
                        $('.phone-flag').css({display:'inline-block','background-image':"url('"+link+"')"});
                } 
            },
            "oncleared": function(){
            	$('.phone-country').text(''); /* clear the country code on empty mask */
            	$('.phone-flag').css({'background-image':"none"});
            }
      });

/*Плагин отслеживания пользователей*/
var trackChanges = false;
/* #~#
$('#post-389 .woocommerce, #post-582 .woocommerce').mouseleave(function(){
    if(trackChanges == false){
        sendData('leave');
    }
    trackChanges = true;
});*/
$('#post-389 .woocommerce input[type="submit"], #post-582 .woocommerce input[type="submit"]').click(function(e){
    if(trackChanges == false){
        if(validateFormData()){
            sendData('submit');
            //$(e.target).trigger('click');
            console.log('click');
        }else{
            e.preventDefault();
            console.log('non-click');
        }
    }
    trackChanges = true;
});
$('#post-389 .woocommerce input, #post-389 .woocommerce select, #post-582 .woocommerce input, #post-582 .woocommerce select').change(function(){
    trackChanges = false;
});
// /main_registration

function validateFormData(){
    var res = false;
    var errors  = [];
    var $reqFields = $('input[required], select[required]');


    console.log($reqFields);
    console.log('req count -> ' + $reqFields.length);


    console.log('validation start');
    console.log('color');
    $.each($reqFields, function (indx, el) {
        if(!el.value){
            errors.push(el);
            $(el).addClass('validation');
        }
    });


    if(errors.length == 0) res = true;
    console.log('return -> '+ res);
    return res;
}
$('input[required], select[required]').change(function(e){
    $(e.target).removeClass('validation');
});
function sendData(action){
    console.log('sendData');

    var formData = $('form.register').serializeArray();
    var filteredData = [], requiredFields = [];
    $.each(formData, function(i,el){
        if(el.value){
            if((el.name!='userRegAide_RegFormNonce')&&(el.name!='_wp_http_referer')&&(el.name!='woocommerce-register-nonce')){
                filteredData.push(el);
            }
        } 
    });
    if(filteredData.length > 0){
        console.log('sendAjax');
        console.log(filteredData);
        var postq = {
            name:'spy',
            value:'myplug'
        };
        filteredData.push(postq);
        //console.log(filteredData);
        var ajaxurl = homeurl+'/wp-content/themes/greencard/spyplugin/spy.php';
        $.post(ajaxurl,filteredData);
        //alert(homeurl);
    }
}
/*конец Плагин отслеживания пользователей*/
/*перевод слов в форме*/
var translate_arr =[
    {tag:'label', eng:'Marital Status:', rus:'Семейное положение:'},
    {tag:'label', eng:'Country of Birth*:', rus:'Страна рождения*:'},
    {tag:'label', eng:'Country of Residence*:', rus:'Страна проживания*:'},
    {tag:'label', eng:'I`m currently working*:', rus:'Я работаю сейчас*:'},
    {tag:'label', eng:'I`m a High Shcool Graduate*:', rus:'У меня есть среднее образование*:'},
    {tag:'label', eng:'Phone: (Home / Office)*:', rus:'Телефон*:'},
    {tag:'label', eng:'Mobile phone*:', rus:'Мобильный телефон*:'},   
    {tag:'div.radio-box', eng:'Unmarried', rus:'<input autocomplete="on" name="marit_status" class="csds_input marit_status" value="Unmarried" type="radio">Неженат/Незамужем<input autocomplete="on" name="marit_status" class="csds_input marit_status" value="Married" type="radio">Женат/Замужем'},
    {tag:'div.radio-box:has(.working)', eng:'yes', rus:'<input autocomplete="on" name="working" class="csds_input working" value="yes" type="radio">да<input autocomplete="on" name="working" class="csds_input working" value="no" type="radio">нет'},
    {tag:'div.radio-box:has(.h_school)', eng:'yes', rus:'<input autocomplete="on" name="h_school" class="csds_input h_school" value="yes" type="radio">да<input autocomplete="on" name="h_school" class="csds_input h_school" value="no" type="radio">нет'}
];
$.each(translate_arr, function(i,el){    
    $('#post-582 .woocommerce '+el.tag+':contains("'+el.eng+'")').html(el.rus);
});
/*конец перевод слов в форме*/

});

