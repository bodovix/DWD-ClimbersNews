<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 12/3/2018
 * Time: 10:56 AM
 */
?>
<?php
require_once  'global/ConnectionSingleton.php';
require_once  'config/config.php';

include_once 'View/Includes/Header.php';
require_once  'global/ConnectionSingleton.php';
?>

<script src="View/JSHandlers/WeatherAPI_JS.js"></script>

<body>
    <div class="container">
        <div id="SearchBar" >
            <div class="row">
                <select id="searchInput" class="p-1">
                    <option value="328328">London</option>
                    <option value="327794">Dundee</option>
                    <option value="328226">Glasgow</option>
                    <option value="532">Inverness</option>
                </select>
                <button id="searchBtn">Search</button>
            </div>
        </div>
        <div id="Results">
            <div class="row">
                <div id="errorMessage" class="alert d-none"></div>
            </div>
            <div class="row">
            <table class="table">
                <tbody>
                <tr>
                    <td>City:</td>
                    <td><p id="locationTxt"></p></td>
                </tr>
                <tr>
                    <td>Time of Reading:</td>
                    <td><p id="timeTxt"></p></td>
                </tr>
                <tr>
                    <td>Weather Summary:</td>
                    <td><p id="summaryTxt"></p></td>
                </tr>
                <tr>
                    <td>Temperature:</td>
                    <td ><p id="tempTxt"></p></td>
                </tr>
                <tr>
                    <td>Link To AccueWeather:</td>
                    <td><a id="linkTxt" href="">AccuWeather</a> </td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</body>
<?php
$pathToPage = URLROOT.'Evaluation.php?week=12';
include 'View/Includes/Footer.php';
?>