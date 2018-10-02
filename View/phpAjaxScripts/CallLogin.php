<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 02/10/2018
 * Time: 17:24
 */
require_once '../../Model/User.php';
require_once  '../../config/config.php';


//get posts
$email = strip_tags($_POST['emailLogin']) ;
$password = strip_tags($_POST['passwordLogin']) ;

//validate
$errorMsg = "";
$userModel = new User();

if (!isset($email) || $email ==""){
    $errorMsg = "Email Required";
}
if (!isset($password) || $password ==""){
    $errorMsg = "Password Required";
}

//check for email address
$resultJson = $userModel->getUserByEmail($email);
$result = json_decode($resultJson);

if (count($result) != 1){
    $errorMsg = "Login failed. please check details and try again  - RESULT NOT EQUAL 1";
}else{

    if (password_verify($password,$result->password)){
        $_SESSION['userId'] = $result['userId'];
    }else{
        $errorMsg = "Login failed. please check details and try again - PASSOWRDS DONT MATCH";
    }
}
echo $errorMsg;