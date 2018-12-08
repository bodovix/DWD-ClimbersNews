<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 02/10/2018
 * Time: 17:24
 */
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../Model/User.php';
require_once '../../config/config.php';
require_once '../SignupControl.php';

//get posts
if (!isset($_POST['emailLogin'])){
    return;
}
if (!isset($_POST['passwordLogin'])){
    return;
}
if(!isset($_POST['captcha'])){
    echo "Captcha POST Error";
    return;
}

$secret="6LfBAHQUAAAAAKWXpl8u1pD0fYIrcKvKfEPaxJID";
$response=$_POST["captcha"];

$verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
$captcha_success=json_decode($verify);
if ($captcha_success->success==false) {
  //This user was not verified by recaptcha.
    echo "Capatcha Not Validated";
    return;
}

$email = strip_tags($_POST['emailLogin']) ;
$password = strip_tags($_POST['passwordLogin']) ;

$signUpControl = new SignupControl();
echo $signUpControl->loginUser($email,$password);

