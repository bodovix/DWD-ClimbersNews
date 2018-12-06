<?php
    include 'View/Includes/Header.php';
    require_once  'global/ConnectionSingleton.php';
    require_once 'Controller/IndexControl.php';
    require_once  'config/config.php';
?>

<?php
    //read query string values into array
    $urlQueries = array();
    parse_str($_SERVER['QUERY_STRING'], $urlQueries);

    //switch to load appropriate weeks stuff
switch($urlQueries["week"]){

    case '1':
        if(file_exists(APPROOT.'/View/Includes/Evaluations/Evaluation-Week-1.php'))
        {
            include_once('View/Includes/Evaluations/Evaluation-Week-1.php');
            $pathToPage = URLROOT.'Index.php';
        }else{
            echo 'File Not found';
        }
        break;
    case '2':
        if(file_exists(APPROOT.'/View/Includes/Evaluations/Evaluation-Week-2.php'))
        {
            include_once('View/Includes/Evaluations/Evaluation-Week-2.php');
            $pathToPage = URLROOT.'Index.php';
        }else{
            echo 'File Not found';
        }
        break;
    case '3':
        if(file_exists(APPROOT.'/View/Includes/Evaluations/Evaluation-Week-3.php'))
        {
            include_once('View/Includes/Evaluations/Evaluation-Week-3.php');
            $pathToPage = URLROOT.'Index.php';
        }else{
            echo 'File Not found';
        }
        break;
    case '4':
        if(file_exists(APPROOT.'/View/Includes/Evaluations/Evaluation-Week-4.php'))
        {
            include_once('View/Includes/Evaluations/Evaluation-Week-4.php');
            $pathToPage = URLROOT.'Signup.php';
        }else{
            echo 'File Not found';
        }
        break;
    case '5':
        if(file_exists(APPROOT.'/View/Includes/Evaluations/Evaluation-Week-5.php'))
        {
            include_once('View/Includes/Evaluations/Evaluation-Week-5.php');
            $pathToPage = URLROOT.'MyArticles.php';
        }else{
            echo 'File Not found';
        }
        break;
    case '6':
        if(file_exists(APPROOT.'/View/Includes/Evaluations/Evaluation-Week-6.php'))
        {
            include_once('View/Includes/Evaluations/Evaluation-Week-6.php');
            $pathToPage = URLROOT.'Index.php';
        }else{
            echo 'File Not found';
        }
        break;
    case '7':
        if(file_exists(APPROOT.'/View/Includes/Evaluations/Evaluation-Week-7.php'))
        {
            include_once('View/Includes/Evaluations/Evaluation-Week-7.php');
            $pathToPage = URLROOT.'IOT2.php';
        }else{
            echo 'File Not found';
        }
        break;
    case '8':
        if(file_exists(APPROOT.'/View/Includes/Evaluations/Evaluation-Week-8.php'))
        {
            include_once('View/Includes/Evaluations/Evaluation-Week-8.php');
            $pathToPage = URLROOT.'IOT2.php';
        }else{
            echo 'File Not found';
        }
        break;
    case '9':
        if(file_exists(APPROOT.'/View/Includes/Evaluations/Evaluation-Week-9.php'))
        {
            include_once('View/Includes/Evaluations/Evaluation-Week-9.php');
            $pathToPage = URLROOT.'IOT2.php';
        }else{
            echo 'File Not found';
        }
        break;
    case '10':
        if(file_exists(APPROOT.'/View/Includes/Evaluations/Evaluation-Week-10.php'))
        {
            include_once('View/Includes/Evaluations/Evaluation-Week-10.php');
            $pathToPage = URLROOT.'Resources/rss/CNRss.txt';
        }else{
            echo 'File Not found';
        }
        break;
    case '11':
        if(file_exists(APPROOT.'/View/Includes/Evaluations/Evaluation-Week-11.php'))
        {
            include_once('View/Includes/Evaluations/Evaluation-Week-11.php');
            $pathToPage = URLROOT.'UkcRss.php';
        }else{
            echo 'File Not found';
        }
        break;
    case '12':
        if(file_exists(APPROOT.'/View/Includes/Evaluations/Evaluation-Week-12.php'))
        {
            include_once('View/Includes/Evaluations/Evaluation-Week-12.php');
            $pathToPage = URLROOT.'WeatherAPI.php';
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
include_once 'View/Includes/Footer.php';
?>
