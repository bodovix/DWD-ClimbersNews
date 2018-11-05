<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 11/1/2018
 * Time: 11:42 AM
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


	include("../../Model/ElectricImpSensors.php") ;
    include( '../../config/config.php');
    include( '../../global/ConnectionSingleton.php');
	// decode the json body from the request
	$jsonbody = file_get_contents('php://input') ;
	$jsonobj = json_decode($jsonbody);
	$device = $jsonobj->device;
	$internal = $jsonobj->internal;
	$external = $jsonobj->external;
	$voltage = $jsonobj->voltage;
    $lightLevel = $jsonobj->lightLevel;

$impModel = new ElectricImpSensors();
    $impModel->Create($jsonbody);
