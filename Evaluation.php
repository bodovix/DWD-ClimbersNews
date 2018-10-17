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

    default:
        echo 'No evaluation found for week: ' . $urlQueries["week"];
        break;
}
?>

<?php
echo "Week " .$urlQueries["week"]."<br>";
echo "Path to page  ".$pathToPage."<br>";
echo "APPROOT   ".APPROOT."<br>";
echo "URLROOT   ".URLROOT."<br>";
include_once 'View/Includes/Footer.php';
?>
