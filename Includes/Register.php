<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 10/1/2018
 * Time: 10:47 AM
 */
?>

<div id="registerFormContainer" class="container border-danger ">
    <form name="registerForm" id="registerForm" class="form col-md-4 mx-auto my-4" method="post">
        <div class="form-group">
            <p class="h3 ">Register</p>
        </div>
        <div id="regAlertMessage" class="alert alert-danger d-none">

        </div>
        <div class="form-group">
            <input id="forenameReg" name="forenameReg" class="form-control" placeholder="First Name" required type="text"/>
        </div>
        <div class="form-group">
            <input id="surnameReg" name="surnameReg" class="form-control"  placeholder="Last Name" required type="text"/>
        </div>
        <div class="form-group">
            <input id="phoneReg" name="phoneReg" class="form-control"  placeholder="Phone Number" required type="text"/>
        </div>

        <div class="form-group">
            <input id="emailReg" name="emailReg" class="form-control"  placeholder="Email" required type="email" />
        </div>

        <div class="form-group">
            <input id="passwordReg" name="passwordReg" class="form-control"  placeholder="Password" required type="password"/>
        </div>

        <div class="form-group">
            <input id="passwordConfReg" name="passwordConfReg" class="form-control"  placeholder="Confirm" required type="password" />
        </div>
        <div class="form-group">
            <input id="registerBtn" type="button" class="btn btn-primary " value="Register"/>
            <input id="clearRegFormBtn" type="button" class="btn btn-danger float-right" value="Clear"/>
        </div>
        <div class="form-group">
            <p class="p-0 small font-italic text-muted mb-0" >Already Have an Account? </p>
            <input id="openLoginForm" type="button" class="btn btn-info " value="Login"/>
        </div>
    </form>
</div>