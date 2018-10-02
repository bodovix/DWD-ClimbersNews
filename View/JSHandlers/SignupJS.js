/**
 * Created by Gwydion on 10/1/2018.
 */
$(function() {

    var formContainer = $('#signupFormsContainer');
    //Load Register Form
    $(document).on('click','#openRegisterForm',function () {
        formContainer.fadeOut("slow").load('Includes/Register.php').fadeIn("slow");
    });
    //Load Login Form
    $(document).on('click','#openLoginForm',function () {
        formContainer.fadeOut("slow").load('Includes/Login.php').fadeIn("slow");
    });
    //ClearForm
    $(document).on('click','#clearRegFormBtn',function () {
        clearRegForm();
    });
    //Register
    $(document).on('click','#registerBtn',function () {
        var alertMsgBox =  $('#regAlertMessage');
       var validateForm = validateRegisterForm();
    
        if (validateForm.error){
            //Invalid
            alertMsgBox.removeClass('d-none');
            alertMsgBox.removeClass('alert-success');
            alertMsgBox.addClass('alert-danger');
            alertMsgBox.text(validateForm.msg);
            return;
        }else {
            //Valid
            alertMsgBox.addClass('d-none');
            alertMsgBox.removeClass('alert-danger');
            alertMsgBox.text("");

            var formData = $('form#registerForm').serialize();
            $.post('View/phpAjaxScripts/CallRegisterUser.php',formData,function (data) {
                if (data !== ""){
                    //Error
                    alertMsgBox.removeClass('d-none');
                    alertMsgBox.removeClass('alert-success');
                    alertMsgBox.addClass('alert-danger');
                    alertMsgBox.text(data);
                    return;
                } else{
                    alertMsgBox.removeClass('d-none');
                    alertMsgBox.addClass('alert-success');
                    alertMsgBox.removeClass('alert-danger');
                    alertMsgBox.text("Registration Successful");
                    clearRegForm();
                }
            });
        }
    
    });

    //Login


//============================================================
    function clearRegForm() {
        $('#forenameReg').val("");
        $('#surnameReg').val("");
        $('#phoneReg').val("");
        $('#emailReg').val("");
        $('#passwordReg').val("");
        $('#passwordConfReg').val("");
    }

    function validateRegisterForm() {
       var forename =  $('#forenameReg').val();
       var surname =  $('#surnameReg').val();
       var phone =  $('#phoneReg').val();
       var email =  $('#emailReg').val();
       var password =  $('#passwordReg').val();
       var passConf =  $('#passwordConfReg').val();

       var isValid = true;
        var msg = "";
        if (passConf !== password){
            isValid = false;
            msg = "Passwords Must Match";
        }
        if (password === ""){
            isValid = false;
            msg = "Password Required";
        }
        if (forename === ""){
            isValid = false;
            msg = "Forename Required";
        }
        if (surname === ""){
            isValid = false;
            msg = "Surname Required";
        }
        if (phone === ""){
            isValid = false;
            msg = "Phone Required";
        }
        if (email === ""){
            isValid = false;
            msg = "Email Required";
        }
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(email)) {
            isValid = false;
            msg ="Invalid Email. Email must be in format 'email@domain.com' or similar";
        }

        return !isValid ? { error: true, msg: msg } : { error: false, msg: msg } ;
    }
});