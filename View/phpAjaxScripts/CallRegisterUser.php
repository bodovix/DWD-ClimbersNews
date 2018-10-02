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
        return;
    }
    if (!isset($surname) || $surname == "") {
        $errorMsg = 'Surname Required';
        return;
    }
    if (!isset($phone) || $phone == "") {
        $errorMsg = 'Phone Required';
        return;
    }
    if (!isset($email) || $email == "") {
        $errorMsg = 'Email Required';
        return;
    }
    if (!isset($password) || $password == "") {
        $errorMsg = 'Password Required';
        return;
    }
    if (!isset($passConf) && $passConf == $password) {
        $errorMsg = 'Passwords Must Match';
        return;
    }
//Check if already exists



//run create
$resultJson = $userModel->creteUser($email,$phone,$forename,$surname);
$result = json_decode($resultJson);

//return message
if ($result == false){
    $errorMsg ="SQL error. Please try again";
}else{

}
echo $errorMsg;
return;

