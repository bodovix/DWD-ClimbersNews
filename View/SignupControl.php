<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 05/10/2018
 * Time: 10:20
 */
include_once '../../Model/User.php';
class SignupControl
{
    private  $con;
    private  $userModel;
    private $genericLoginErrorMsg = "Login failed. please check details and try again.";

    public function __construct()
    {
        $this->userModel= new User();
        $this->con = ConnectionSingleton::Instance()->GetCon();
    }


    private function validateLogin($email,$password){
        if (!isset($email) || $email ==""){
            return "Email Required";
        }
        if (!isset($password) || $password ==""){
            return "Password Required";
        }
        return "";
    }


    public function loginUser($email,$password){
        $validateLogin = $this->validateLogin($email,$password);
        if ($validateLogin !=""){
            return $validateLogin;
        }
        //check for email address
        $resultJson = $this->userModel->getUserByEmail($email);
        try {
            //check API returned something
            if ($resultJson == null || !isset($resultJson) || $resultJson == false){
                return $this->genericLoginErrorMsg;
            }
            $result = json_decode($resultJson);
        } catch (Exception $e) {
            return $e->getMessage();
        }
//check if User found with email
        if (!isset($result) ||$result == null ||$result == false){
            return $this->genericLoginErrorMsg;
        }
//Verify
        if (password_verify($password,$result->password)){
            $_SESSION['userId'] = $result->id;

        }else{
            return $this->genericLoginErrorMsg;
        }
        return "";
    }

     private function validateRegister($forename,$surname,$phone,$email,$password,$passConf){
         //validate
         if (!isset($forename) || $forename == "") {
             return 'Forename Required';
         }
         if (!isset($surname) || $surname == "") {
             return 'Surname Required';
         }
         if (!isset($phone) || $phone == "") {
             return 'Phone Required';
         }
         if (!isset($email) || $email == "") {
             return 'Email Required';
         }
         if (!isset($password) || $password == "") {
             return 'Password Required';
         }
         if (!isset($passConf) && $passConf == $password) {
             return 'Passwords Must Match';
         }
//Check if email exists
         $emailFoundJson = $this->userModel->countUsersByEmail($email);
         $result = json_decode($emailFoundJson);

         if ($result > 0){
             return "Email already used";
         }
         return "";
     }

    public function  registerUser($forename,$surname,$phone,$email,$password,$passConf){
        $validateRegistration = $this->validateRegister($forename,$surname,$phone,$email,$password,$passConf);
        if ($validateRegistration != ""){
            return $validateRegistration;
        }
        //Register
        //Hash Password::

        // default hashing algorithm is bcrypt
        //can add custom salt, or leave blank for default (10)
        $password = password_hash($password, PASSWORD_DEFAULT);

        //run create
        $resultJson = $this->userModel->creteUser($email,$password,$phone,$forename,$surname);
        $result = json_decode($resultJson);

        //return message
        if ($result == false){
            return "SQL error. Please try again";
        }
        return "";

    }
}