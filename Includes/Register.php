<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 10/1/2018
 * Time: 10:47 AM
 */
?>

<div id="registerForm" class="container border-danger ">
    <div class="form col-md-4 mx-auto my-4">
        <div class="form-group">
            <p class="h3 ">Register</p>
        </div>
        <div class="form-group">
            <input name="forenameLogin" class="form-control" placeholder="First Name" required type="text"/>
        </div>
        <div class="form-group">
            <input name="surnameLogin" class="form-control"  placeholder="Last Name" required type="text"/>
        </div>
        <div class="form-group">
            <input name="phoneLogin" class="form-control"  placeholder="Phone Number" required type="text"/>
        </div>

        <div class="form-group">
            <input name="emailLogin" class="form-control"  placeholder="Email" required type="text"/>
        </div>

        <div class="form-group">
            <input name="passwordLogin" class="form-control"  placeholder="Password" required type="text"/>
        </div>

        <div class="form-group">
            <input name="passwordConfLogin" class="form-control"  placeholder="Confirm" required type="text"/>
        </div>
        <div class="form-group">
            <input type="button" class="btn btn-primary " value="Register"/>
            <input type="button" class="btn btn-danger float-right" value="Clear"/>
        </div>
        <div class="form-group">
            <p class="p-0 small font-italic text-muted mb-0" >Already Have an Account? </p>
            <input id="openLoginForm" type="button" class="btn btn-info " value="Login"/>
        </div>
    </div>
</div>