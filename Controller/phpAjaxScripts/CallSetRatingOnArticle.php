<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 22/10/2018
 * Time: 21:41
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once '../../Model/Feedback.php';
require_once '../../Model/Article.php';
require_once '../../Model/User.php';
require_once '../../Model/Rating.php';
require_once '../../config/config.php';
require_once '../ReadArticlesControl.php';
include_once '../../global/ConnectionSingleton.php';

if (!isset($_POST['rating'])){
    echo "Invalid Rating";
    return;
}
if (!isset($_POST['articleId'])){
    echo"Invalid Article";
    return;
}

if (!isset($_SESSION['userId'])){

    echo "Not logged in";
    return;
}

$ratingControl = new ReadArticlesControl();
echo $ratingControl->setRatingOnArticle($_POST['rating'],$_POST['articleId'],$_SESSION['userId']);

