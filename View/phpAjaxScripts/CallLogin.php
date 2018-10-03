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
require_once  '../../config/config.php';


//get posts
$email = strip_tags($_POST['emailLogin']) ;
$password = strip_tags($_POST['passwordLogin']) ;

//validate
$errorMsg = "";
$userModel = new User();
$genericErrorMsg = "Login failed. please check details and try again.";

if (!isset($email) || $email ==""){
    echo "Email Required";
    return;
}
if (!isset($password) || $password ==""){
    echo "Password Required";
    return;
}
//check for email address
$resultJson = $userModel->getUserByEmail($email);
try {
    //check API returned something
    if ($resultJson == null || !isset($resultJson) || $resultJson == false){
        echo  $genericErrorMsg;
        return;
    }
        $result = json_decode($resultJson);
} catch (Exception $e) {
        echo $e->getMessage();
        return;
}
//check if User found with email
if (!isset($result) ||$result == null ||$result == false){
    echo $genericErrorMsg;
    return;
}
//Verify
if (password_verify($password,$result->password)){
    $_SESSION['userId'] = $result->id;

}else{
    echo $genericErrorMsg;
    return;
}
echo "";

