<?php
    include 'View/Header.php';
    require_once  'global/ConnectionSingleton.php';
    require_once 'ViewModels/IndexControl.php';
    require_once  'config/config.php';
?>

<?php
    //read query string values into array
    $urlQueries = array();
    parse_str($_SERVER['QUERY_STRING'], $urlQueries);

    //switch to load appropriate weeks stuff
switch($urlQueries["week"]){

    case '1':
        if(file_exists(APPROOT.'/View/Evaluation-Week-1.php'))
        {
            include_once('View/Evaluation-Week-1.php');
            $pathToPage = URLROOT.'Index.php';
        }else{
            echo 'File Not found';
        }
        break;
    case '2':
        if(file_exists(APPROOT.'/View/Evaluation-Week-2.php'))
        {
            include_once('View/Evaluation-Week-2.php');
            $pathToPage = URLROOT.'ReadArticles.php';
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

include 'View/Footer.php';
?>
