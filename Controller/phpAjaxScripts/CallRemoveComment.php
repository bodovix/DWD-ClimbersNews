<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 22/10/2018
 * Time: 15:27
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once '../../Model/Feedback.php';
require_once '../../Model/Article.php';
require_once '../../Model/User.php';
require_once '../../config/config.php';
require_once '../ReadArticlesControl.php';
include_once '../../global/ConnectionSingleton.php';


if (!isset($_POST['id]'])){
    return "failed to remove Comment";
}

$feedbackControl = new ReadArticlesControl();
return  $feedbackControl->removeComment($_POST['id']);