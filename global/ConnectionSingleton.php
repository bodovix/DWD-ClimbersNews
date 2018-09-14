<?php

/**
 * Singleton class
 *
 */
final class ConnectionSingleton
{
    private $con;
    /**
     * @return ConnectionSingleton
     */
    public static function Instance()
    {
        static $inst = null;
        if ($inst === null) {
            $inst = new ConnectionSingleton();
        }
        return $inst;
    }

    public function GetCon(){
        return $this->con;
    }
    /**
     * Private ctor is key to singleton
     *
     */
    private function __construct()
    {
        try{
            $host = DB_HOST;
            $dbname = DB_NAME;
            $username = DB_USER;
            $password = DB_PASS;

            $this->con = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8',$username,$password);
        }catch(PDOException $e){
            die("Connectoin Failed");
        }
    }
}