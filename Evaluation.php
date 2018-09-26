<?php
    include 'Includes/Header.php';
    require_once  'global/ConnectionSingleton.php';
    require_once 'View/IndexControl.php';
    require_once  'config/config.php';
?>

<?php
    //read query string values into array
    $urlQueries = array();
    parse_str($_SERVER['QUERY_STRING'], $urlQueries);

    //switch to load appropriate weeks stuff
switch($urlQueries["week"]){

    case '1':
        if(file_exists(APPROOT.'/Includes/Evaluations/Evaluation-Week-1.php'))
        {
            include_once('Includes/Evaluations/Evaluation-Week-1.php');
            $pathToPage = URLROOT.'Index.php';
        }else{
            echo 'File Not found';
        }
        break;
    case '2':
        if(file_exists(APPROOT.'/Includes/Evaluations/Evaluation-Week-2.php'))
        {
            include_once('Includes/Evaluations/Evaluation-Week-2.php');
            $pathToPage = URLROOT.'Index.php';
        }else{
            echo 'File Not found';
        }
        break;
    case '3':
        if(file_exists(APPROOT.'/Includes/Evaluations/Evaluation-Week-3.php'))
        {
            include_once('Includes/Evaluations/Evaluation-Week-3.php');
            $pathToPage = URLROOT.'Index.php';
        }else{
            echo 'File Not found';
        }
        break;

    default:
        echo 'No evaluation found for week: ' . $urlQueries["week"];
        break;
}
?>

<?php

include 'Includes/Footer.php';
?>
