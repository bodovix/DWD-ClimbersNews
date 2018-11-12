<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 11/12/2018
 * Time: 12:50 PM
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once  '../../global/ConnectionSingleton.php';
require_once '../../Controller/ElectricImpControl.php';
require_once  '../../config/config.php';
require_once '../../Model/ElectricImpSensors.php';
$impControl = new ElectricImpControl();


$urlQueries = array();
parse_str($_SERVER['QUERY_STRING'], $urlQueries);
if (!isset($urlQueries["readingNumber"])){
    //Display Error
    $test =  "not set";
}else {
    //Get Details
    //Display Success
    $test = "test click";

   $result = $impControl->GetResultByID($urlQueries["readingNumber"]);
}
?>
<div data-role="page">

    <!--    JQuery 3.3.1  to power custom JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
          crossorigin="anonymous">

<!--JQuery Mobile-->
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>


        <div data-role="header">
            <nav class="navbar navbar-expand-sm  navbar-dark bg-primary ">
                <div class="container">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link rel="external" data-ajax='true'" href="<?php echo '../../IOT.php'; ?>">Return To Results</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <h1>Date: <?php echo $result->createdOn ?>
                <br>
                Device: <?php echo $result->data->device; ?></h1>
        </div>
        <div data-role="main">
            <div class="container">
                <div class="row">
                    <p>External Temp:</p>
                    <p><?php echo $result->data->external; ?> &#x2103;</p>
                </div>
                <div class="row">
                    <p>Internal Temp: </p>
                    <p><?php echo $result->data->internal; ?> &#x2103;</p>
                </div>
                <div class="row">
                    <p>Voltage: </p>
                    <p><?php echo $result->data->voltage; ?> V</p>
                </div>
                <div class="row">
                    <p>Light Level: </p>
                    <p><?php echo $result->data->lightLevel; ?> </p>
                </div>
            </div>

        </div>
        <div data-role="footer">
            <div class="row bg-secondary" >
                <div class=" col ">
                    <p class="mb-0">Gwydion Saxelby</p>
                    <p class="mb-0">1701267@uad.ac.uk</p>
                </div>

                <div class=" bg-secondary col offset-md-6 offset-sm-0">
                    <a class="btn btn-primary "  href="../../Evaluation.php?week=9" data-ajax="false">Evaluation</a>
                </div>
            </div>
        </div>
    </div>
