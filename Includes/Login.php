<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 10/1/2018
 * Time: 10:48 AM
 */
?>
<link
<div id="registerForm" class="container border-danger ">
    <form name="loginForm" id="loginForm" class="form col-md-4 mx-auto my-4">
        <div class="form-group">
            <p class="h3 ">Login</p>
        </div>

        <div class="form-group">
            <input name="emailLogin" class="form-control"  placeholder="Email" required type="text"/>
        </div>

        <div class="form-group">
            <input name="passwordLogin" class="form-control"  placeholder="Password" required type="text"/>
        </div>

        <div class="form-group ">
            <div class=" d-inline">
                <input type="button" class="btn btn-primary d-inline" value="Login"/>
            </div>
            <div class="ml-auto d-inline">
                <p class="p-0 small font-italic text-muted mb-0" >Don't Have an Account? </p>
                <input id="openRegisterForm" type="button" class="btn btn-info " value="Register"/>
            </div>

        </div>
        <div class="form-group">

        </div>
    </form>
</div>