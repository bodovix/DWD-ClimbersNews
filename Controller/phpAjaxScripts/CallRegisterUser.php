<?php


require_once '../../Model/User.php';
require_once '../../config/config.php';
require_once '../SignupControl.php';

//get posts
if (!isset($_POST['forenameReg'])){
    return;
}
if (!isset($_POST['surnameReg'])){
    return;
}
if (!isset($_POST['phoneReg'])){
    return;
}
if (!isset($_POST['emailReg'])){
    return;
}
if (!isset($_POST['passwordReg'])){
    return;
}
if (!isset($_POST['passwordConfReg'])){
    return;
}

$forename = strip_tags($_POST['forenameReg']) ;
$surname = strip_tags($_POST['surnameReg']) ;
$phone = strip_tags($_POST['phoneReg']) ;
$email = strip_tags($_POST['emailReg']) ;
$password = strip_tags($_POST['passwordReg']) ;
$passConf = strip_tags($_POST['passwordConfReg']) ;


$signUpControl = new SignupControl();
echo $signUpControl->registerUser($forename,$surname,$phone,$email,$password,$passConf);


