<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 13/09/2018
 * Time: 15:04
 */

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
            $host = 'lochnagar.abertay.ac.uk';
            $dbname = 'sql1701267';
            $username = 'sql1701267';
            $password = '93dkgPgqqHNP';

            $this->con = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8',$username,$password);
        }catch(PDOException $e){
            die("Connectoin Failed");
        }
    }

}