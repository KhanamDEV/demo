$("#btn-login").click(function () {
    $(this).attr('disabled', 'disabled');
    let formElement = $('#form-login');
    let action = formElement.attr('action');
    var formData = {
        _token: formElement.find("input[name='_token']").val(),
        email: formElement.find("input[name='email']").val(),
        password: formElement.find("input[name='password']").val(),
    };
   if(isExistEmail(formData.email, 'inputEmail') && isExistPassword(formData.password, 'inputPassword')){
       $.ajax({
           type : "POST",
           url : action,
           data: formData,
           success: function(data, textStatus ,jqXHR) {
               window.location.replace(data);
           },
           error: function (jqXHR, textStatus, errorThrown) {
               if(jqXHR.status === 500){
                   $("#error-response").addClass("active");
                   $("#error-response").text("User not found");
               }
           }
       });
       $(this).removeAttr('disabled');
   }
   else{
       $("#error-response").removeClass("active");
       isExistEmail(formData.email, 'inputEmail');
       isExistPassword(formData.password, 'inputPassword');
       $(this).removeAttr('disabled')
   }
   return false;
});

//validate email
function isExistEmail(str, id = 'inputEmail') {
    var errorMessageElement = $("#" + id);
    var flag = false;
    if (!isExist(str)) {
        errorMessageElement.parent().children('div.valid-feedback').text(lang_messages['validate.required']);
        flag = true;
    } else if (!isCurrentEmail(str)) {
        errorMessageElement.parent().children('div.valid-feedback').text(lang_messages['validate.email']);
        flag = true;
    }
    if (flag) {
        errorMessageElement.parent().children('div.valid-feedback').addClass('active');
        return false;
    } else{
        errorMessageElement.parent().children('div.valid-feedback').removeClass('active');
    }
    return true;
}

//validate password
function isExistPassword(str, id = 'inputPassword') {
    var errorMessageElement = $("#" + id);
    var flag = false;
    if (!isExist(str)) {
        errorMessageElement.parent().children('div.valid-feedback').text(lang_messages['validate.required']);
        flag = true;
    } else if (!isStringLengthMinMax(str)) {
        errorMessageElement.parent().children('div.valid-feedback').text(lang_messages['validate.password']);
        flag = true;
    }
    if (flag) {
        errorMessageElement.parent().children('div.valid-feedback').addClass('active');
        return false;
    } else{
        errorMessageElement.parent().children('div.valid-feedback').removeClass('active');
    }
    return true;
}

