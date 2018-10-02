<?php


require_once '../../Model/User.php';
require_once  '../../config/config.php';

//get posts
$forename = strip_tags($_POST['forenameReg']) ;
$surname = strip_tags($_POST['surnameReg']) ;
$phone = strip_tags($_POST['phoneReg']) ;
$email = strip_tags($_POST['emailReg']) ;
$password = strip_tags($_POST['passwordReg']) ;
$passConf = strip_tags($_POST['passwordConfReg']) ;

$errorMsg = "";
$userModel = new User();

//validate

    if (!isset($forename) || $forename == "") {
        $errorMsg = 'Forename Required';
    }
    if (!isset($surname) || $surname == "") {
        $errorMsg = 'Surname Required';
    }
    if (!isset($phone) || $phone == "") {
        $errorMsg = 'Phone Required';
    }
    if (!isset($email) || $email == "") {
        $errorMsg = 'Email Required';
    }
    if (!isset($password) || $password == "") {
        $errorMsg = 'Password Required';
    }
    if (!isset($passConf) && $passConf == $password) {
        $errorMsg = 'Passwords Must Match';
    }
//Check if email exists
$emailFoundJson = $userModel->countUsersByEmail($email);
$result = json_decode($emailFoundJson);

if ($result > 0){
    $errorMsg = "Email already used";
}
//Hash Password

// default hashing algorithm is bcrypt
//can add custom salt, or leave blank for default (10)
$password = password_hash($password, PASSWORD_DEFAULT);

//run create
$resultJson = $userModel->creteUser($email,$password,$phone,$forename,$surname);
$result = json_decode($resultJson);

//return message
if ($result == false){
    $errorMsg ="SQL error. Please try again";
}
echo $errorMsg;
return;

