<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 11/12/2018
 * Time: 11:18 AM
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../Model/ElectricImpSensors.php';
require_once '../../config/config.php';
require_once '../ElectricImpControl.php';
require_once  '../../global/ConnectionSingleton.php';

$impControl = new ElectricImpControl();

echo $impControl->DisplayRecentReadings();
