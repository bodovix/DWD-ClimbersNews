<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 11/12/2018
 * Time: 12:50 PM
 */


$urlQueries = array();
parse_str($_SERVER['QUERY_STRING'], $urlQueries);
if (!isset($urlQueries["readingNumber"])){
    //Display Error
    $test =  "not set";
}else {
    //Get Details
    //Display Success
    $test = "test click";
}
?>
<div data-role="page">
        <div data-role="header">
            <h1>Reading For <?php echo $test; ?> </h1>
        </div>
        <div data-role="main">
            <div class="container">
                <div class="row">
                    <p>Device - </p>
                    <p>Value</p>
                </div>
                <div class="row">
                    <p>External Temp - </p>
                    <p>Value</p>
                </div>
                <div class="row">
                    <p>Internal Temp - </p>
                    <p>Value</p>
                </div>
                <div class="row">
                    <p>Voltage - </p>
                    <p>Value</p>
                </div>
                <div class="row">
                    <p>Light Level - </p>
                    <p>Value</p>
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
