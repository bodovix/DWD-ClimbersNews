<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 03/10/2018
 * Time: 10:31
 */
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(isset($_POST['searchBarValue'])){
    $search = $_POST['searchBarValue'];

    $url = "https://dataservice.accuweather.com/currentconditions/v1/";
    $key = "?apikey=3gNVfD6ZaGHbdAwi1Nb8UgmIj6Il9UwY";

    $responseJSon = file_get_contents($url.$search.$key);

    $response = json_decode($responseJSon);
    echo $responseJSon;

}else{
    echo "";
}

