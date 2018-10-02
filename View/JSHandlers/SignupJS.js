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
        $('#forenameReg').val("");
        $('#surnameReg').val("");
        $('#phoneReg').val("");
        $('#emailReg').val("");
        $('#passwordReg').val("");
        $('#passwordConfReg').val("");
    });
    //Register
    $(document).on('click','#registerBtn',function () {
       var validateForm = validateRegisterForm();
    
        if (validateForm.error){
            //Invalid
            $('#regAlertMessage').removeClass('d-none');
            $('#regAlertMessage').text(validateForm.msg);
            return;
        }else {
            //Valid
            $('#regAlertMessage').addClass('d-none');
            $('#regAlertMessage').text("");


            $.post('View/phpAjaxScripts/CallRegisterUser.php',$('#registerForm').serialize(),function (data) {
                alert("post complete");
            });
        }
    
    });

    //Login


//============================================================
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

        return !isValid ? { error: true, msg: msg } : { error: false, msg: msg } ;
    }
});