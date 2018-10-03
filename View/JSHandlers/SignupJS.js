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
            showErrorMsg(alertMsgBox,validateForm.msg);
            return;
        }else {
            //Valid
            hideMessageBox(alertMsgBox);

            var formData = $('form#registerForm').serialize();
            $.post('View/phpAjaxScripts/CallRegisterUser.php',formData,function (data) {
                if (data !== ""){
                    //Error
                    showErrorMsg(alertMsgBox,data);
                    return;
                } else{
                    showSuccessMessage(alertMsgBox,"Registration Successful")
                    clearRegForm();
                }
            });
        }
    });

    //Login
    $(document).on('click','#loginBtn',function () {
        var alertMsgBox = $('#loginAlertMessage');
        var validateForm = validateLogin();

        if (validateForm.error){
            //Error
            showErrorMsg(alertMsgBox,validateForm.msg);
            return;
        }else {
            //Valid
            hideMessageBox(alertMsgBox);

            var formData = $('form#loginForm').serialize();

            $.ajax({
                type: "POST",
                data: formData,
                url: 'View/phpAjaxScripts/CallLogin.php',
                //  dataType: "html",
                //  async: true,
                success: function(data) {
                    if (data !== ""){
                        //Error
                        showErrorMsg(alertMsgBox,data);
                        return;
                    } else{
                        showSuccessMessage(alertMsgBox,"Login Successful");
                        clearLoginForm();
                    }
                },
                error: (error) => {
                    console.log(JSON.stringify(error));
                }
            });
        }
    });

    //Logout
    $(document).on('click','#LogoutLink',function () {
        alert("test");
        $.post('View/phpAjaxScripts/CallLogout.php');
    });

//============================================================
    function showSuccessMessage(alertMsgBox,successMessage) {
        alertMsgBox.removeClass('d-none');
        alertMsgBox.addClass('alert-success');
        alertMsgBox.removeClass('alert-danger');
        alertMsgBox.text(successMessage);
    }
    function showErrorMsg(alertBox,errorMessage) {
        alertBox.removeClass('d-none');
        alertBox.removeClass('alert-success');
        alertBox.addClass('alert-danger');
        alertBox.html(errorMessage);
    }

    function hideMessageBox(alertMsgBox) {
        alertMsgBox.addClass('d-none');
        alertMsgBox.removeClass('alert-danger');
        alertMsgBox.html("");
    }

    function clearLoginForm() {

        $('#emailLogin').val("");
        $('#passwordLogin').val("");
    }
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
        //check if valid email
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(email)) {
            isValid = false;
            msg ="Invalid Email.";
        }

        if (email === ""){
            isValid = false;
            msg = "Email Required";
        }


        return !isValid ? { error: true, msg: msg } : { error: false, msg: msg } ;
    }

    function validateLogin() {
      var email =  $('#emailLogin').val();
      var password =   $('#passwordLogin').val();

      var isValid = true;
      var msg = "";

      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if (!filter.test(email)) {
           isValid = false;
           msg ="Invalid Email.";
      }

        if (email === "") {
            isValid =false;
            msg = "Email Required";
        }

      if (password === "") {
          isValid =false;
          msg = "Password Required";
      }

        return !isValid ? { error: true, msg: msg } : { error: false, msg: msg } ;
    }
});