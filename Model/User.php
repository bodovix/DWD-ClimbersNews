<?php
include_once '../../global/ConnectionSingleton.php';

/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 10/1/2018
 * Time: 12:46 PM
 */
class User
{
    private $con;

    public function __construct()
    {
        $this->con = ConnectionSingleton::Instance()->GetCon();
    }

    public function getUserById($id){
        $query = $this->con-> prepare("select * from user where id = :userId");
        $success = $query -> execute(['userId' => $id]);

        if ($success && $query -> rowCount() > 0){
            $result = $query -> fetch(PDO::FETCH_OBJ);
            if (!is_null($result)){
                $json = json_encode($result);
                return $json;
            }else{
                return null;
            }
        }else{
            return null;
        }
    }
    public function getUserByEmail($email){
        $query = $this->con-> prepare("select * from user where email = :email");
        $success = $query -> execute(['email' => $email]);

        if ($success && $query -> rowCount() > 0){
            $result = $query -> fetch(PDO::FETCH_OBJ);
            if (!is_null($result)){
                $json = json_encode($result);
                return $json;
            }else{
                return json_encode(false);
            }
        }else{
            return json_encode(false);
        }
    }
    public function countUsersByEmail($email){
        $query = $this->con-> prepare("select * from user where email = :email");
        $success = $query -> execute(['email' => $email]);

        if ($success){

            return json_encode($query -> rowCount());
        }else{
            return null;
        }
    }


    public function creteUser($email,$password,$phoneNumber,$forename,$surname){
        $createdOn = date('Y-m-d',strtotime("now"));
        $query = $this->con-> prepare("insert into user (userStatus,userRole,email,password,phoneNumber,forename,surname,createdOn) 
		values (:userStatus,:userRole,:email,:password,:phoneNumber,:forename,:surname,:createdOn);");
        $success = $query -> execute([
            'userStatus' => 'active',
            'userRole' => 'user',
            'email' => $email,
            'password' => $password,
            'phoneNumber' =>$phoneNumber,
            'forename' => $forename,
            'surname' => $surname,
            'createdOn' =>$createdOn
            ]);

        if ($success && $query -> rowCount() > 0){
            $json = json_encode(true);
            return $json;
        }else{
            return json_encode(false);
        }
    }
    //TODO: Update User

    //TODO: delete User
}