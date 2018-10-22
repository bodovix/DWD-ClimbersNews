<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 10/22/2018
 * Time: 12:15 PM
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


if (!isset($_SESSION['userId'])){
    return "User not logged in";
}

if(!isset($_POST['feedback'])){
    return 1;
}
if(!isset($_POST['article'])){
    return 2;
}

$feedbackControl = new ReadArticlesControl();
return  $feedbackControl->addComment($_POST['feedback'],true,$_SESSION['userId'],$_POST['article']);


