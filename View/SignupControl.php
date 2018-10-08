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
        if (strlen($email) > 80){
            return "Email Must be less than 70 characters long.";
        }
        if (!isset($password) || $password ==""){
            return "Password Required";
        }
        if (strlen($password) > 200){
            return "Password Must be less than 200 characters long.";
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
         if(strlen($forename) > 60){
             return "Forename must be less than 60 characters long";
         }
         if (!isset($surname) || $surname == "") {
             return 'Surname Required';
         }
         if(strlen($surname) > 60){
             return "Surname must be less than 60 characters long";
         }
         if (!isset($phone) || $phone == "") {
             return 'Phone Required';
         }
         if (strlen($phone) > 15){
             return "Phone number must be less than 15 characters long";
         }
         $phoneRegEx = '/^[1-9][0-9]{9,14}$/';
         if(!preg_match($phoneRegEx,$phone)){
             return 'Invalid Phone format. phone must only contain numbers: 0-9 and be between 10 and 15 characters long';
         }
         if (!isset($email) || $email == "") {
             return 'Email Required';
         }
         if(strlen($email) > 70){
             return "Email must be less than 70 characters long";
         }
         $emailRegEx = '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/';
         if(!preg_match($emailRegEx, $email)){
             return "Invalid Email.";
         }
         if (!isset($password) || $password == "") {
             return 'Password Required';
         }
         if (strlen($password) > 200){
             return "Password must be less than 200 characters long";
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