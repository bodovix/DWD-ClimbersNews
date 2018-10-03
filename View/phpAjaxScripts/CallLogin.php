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
    if ($resultJson == null || !isset($resultJson) || $resultJson == false){
        echo  "Login failed. please check details and try again.";
        return;
    }
        $result = json_decode($resultJson);
} catch (Exception $e) {
        echo $e->getMessage();
        return;
}
//Verify
if (password_verify($password,$result->password)){
    $_SESSION['userId'] = $result->id;

}else{
    echo "Login failed. please check details and try again.";
    return;
}
echo "";

