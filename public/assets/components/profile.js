$(function(){
	$("#telephone").intlTelInput({
	    initialCountry: $('input[name="country_code"]').val(),
	    preferredCountries: ["sa","ae","bh","kw","om","eg"],
	});

	$(document).on('click','button.updateProfile',function(e){
        e.preventDefault();
        e.stopPropagation();

        var phone =  $("#telephone").intlTelInput("getNumber");

        if (!$("#telephone").intlTelInput("isValidNumber")) {
            if(lang == 'en'){
                errorNotification("This Phone Number Isn't Valid!");
            }else{
                errorNotification("هذا رقم الجوال غير موجود");
            }
        }

        $('input[name="check"]').val(phone);
        $('form.updateProf').submit();
    });	
})