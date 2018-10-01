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
    //Login

    //Register
});