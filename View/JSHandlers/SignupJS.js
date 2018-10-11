/**
 * Created by Gwydion on 10/1/2018.
 */
$(function() {

    var formContainer = $('#signupFormsContainer');
    //Load Register Form
    $(document).on('click','#openRegisterForm',function () {
        formContainer.load('Includes/Register.php');
    });
    //Load Login Form
    $(document).on('click','#openLoginForm',function () {
        formContainer.load('Includes/Login.php');
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
    //Password Strength
    var lastClassApplied = "";
    $(document).on('keyup','#passwordReg',function () {
        var password = $('#passwordReg').val();
        var passwordBar = $('#passwordStrengthBar');
        var result = calculatePasswordStrength(password);

        passwordBar.html(result.strength +'%');
        passwordBar.width(result.strength+'%');
        passwordBar.removeClass(lastClassApplied);
        passwordBar.addClass(result.styleToShow);
        lastClassApplied = result.styleToShow;
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
                       location.reload();
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
        $.post('View/phpAjaxScripts/CallLogout.php');
        location.reload();
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
        var passBar = $('#passwordStrengthBar');
        passBar.html("");
        passBar.width(0);
        passBar.removeClass(lastClassApplied);
        lastClassApplied = "";
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
        var passwordStrength = calculatePasswordStrength(password);
        if (passwordStrength.strength <= 60){
            isValid = false;
            msg = "Password not strong enough";
        }
        if (password.length < 5){
            isValid = false;
            msg = "Password not long enough";
        }
        if (password === ""){
            isValid = false;
            msg = "Password Required";
        }
        if(password.length > 200){
            isValid = false;
            msg = "Password must be less than 200 characters long";
        }

        if (forename === ""){
            isValid = false;
            msg = "Forename Required";
        }
        if(forename.length > 60){
            isValid = false;
            msg = "Forename must be less than 60 characters long";
        }
        if (surname === ""){
            isValid = false;
            msg = "Surname Required";
        }
        if(surname.length > 60){
            isValid = false;
            msg = "Surname must be less than 60 characters long";
        }
        if (phone === ""){
            isValid = false;
            msg = "Phone Required";
        }
        if(phone.length > 15){
            isValid = false;
            msg = "Phone number must be less than 15 characters long"
        }
        var phoneFilter = /^[0-9]{9,14}$/;
        if(!phoneFilter.test(phone)){
            isValid = false;
            msg = "Phone must only contain numbers: 0-9 and be between 10 and 15 characters long";
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
        if(email.length > 70){
            isValid =false;
            msg = "Email must be less than 70 characters long";
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
        if (email.length > 70){
          isValid=false;
          msg = "Email Must be less than 70 characters long."
        }

      if (password === "") {
          isValid =false;
          msg = "Password Required";
      }
      if(password.length > 200){
            isValid = false;
            msg = "Password Must be less than 200 characters long."
      }

        return !isValid ? { error: true, msg: msg } : { error: false, msg: msg } ;
    }

    function calculatePasswordStrength(password) {
        var passwordStrength = 0;
        var styleToApply = "";
        if (password.length > 20) {
            passwordStrength += 33;
        }
        else if (password.length > 10) {
            passwordStrength += 20;
        }
        else if (password.length  > 5) {
            passwordStrength += 15;
        }
        else if (password.length > 3) {
            passwordStrength += 10;
        }
        else if (password.length > 2) {
            passwordStrength += 5;
        }
        else {
            passwordStrength += 0;
        }
        if (password.match(/[a-z]/) && password.match(/[A-Z]/)){
            passwordStrength += 33
        }
        if (password.match(/[!@#$%^&*(),=_+£.?":{}|<>]/)){
            passwordStrength += 33;
        }

        if (passwordStrength > 80){
            styleToApply = "bg-success";
        } else if(passwordStrength > 60){
            styleToApply = "bg-info";
        }else if(passwordStrength > 30){
            styleToApply = "bg-warning";
        }else{
            styleToApply = "bg-danger";
        }
        return {strength: passwordStrength, styleToShow: styleToApply};
    }
});