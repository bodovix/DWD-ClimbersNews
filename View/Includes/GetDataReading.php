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
   $result = $impControl->GetResultByID($urlQueries["readingNumber"]);
    //Display Success

}
?>
<div data-role="page">

    <!--    JQuery 3.3.1  to power custom JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../JSHandlers/GetDataReadingJS.js"></script>
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
                <div class="row alert mt-3">
                   <p data-role="content">External Temp:</p>
                   <div id="externalTemp"  data-role="content" data-reading="<?php echo $result->data->external; ?>"><?php echo $result->data->external; ?> &#x2103;</div>
                </div>

                <div class="row  alert">
                    <p data-role="content">Internal Temp: </p>
                    <p id="internalTemp" data-role="content" data-reading="<?php echo $result->data->internal; ?>"><?php echo $result->data->internal; ?> &#x2103;</p>
                </div>
                <div class="row  alert">
                    <p data-role="content">Voltage Level: </p>
                    <p id="voltage" data-role="content" data-reading="<?php echo $result->data->voltage; ?>"><?php echo $result->data->voltage; ?> V</p>
                </div>
                <div class="row alert">
                    <p data-role="content">Light Level:   </p>
                    <p id="lightLevel" data-role="content" <?php echo $result->data->lightLevel; ?>"><?php echo $result->data->lightLevel; ?> </p>
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
