<?php
try{
    $host = 'lochnagar.abertay.ac.uk';
    $dbname = 'sql1701267';
    $username = 'sql1701267';
    $password = '93dkgPgqqHNP';

    $con = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8',$username,$password);
}catch(PDOException $e){
    die("Connectoin Failed");
}




