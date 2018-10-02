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
    //TODO: Get User
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
    //TODO: Create User
    public function creteUser($email,$phoneNumber,$forename,$surname){
        $createdOn = date('Y-m-d',strtotime("now"));
        $query = $this->con-> prepare("insert into user (userStatus,userRole,email,phoneNumber,forename,surname,createdOn) 
		values (:userStatus,:userRole,:email,:phoneNumber,:forename,:surname,:createdOn);");
        $success = $query -> execute([
            'userStatus' => 'active',
            'userRole' => 'user',
            'email' => $email,
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