<?php
require_once  'global/ConnectionSingleton.php';
require_once 'Controller/IndexControl.php';
require_once  'config/config.php';

$indexControl = new IndexControl();

?>
<?php
include_once 'View/Includes/Header.php';
include_once 'View/Includes/SearchBar.php';
?>
<script src="View/JSHandlers/IOTJS.js"></script>
<body>
<div class="row">
    <div class="col-6">
        <div> Week 7 Electric Imp LED controll pannel</div>
        <input id="redOff" type="button" class="btn mx-4" value="Red Off" />
        <input id="redOn" type="button" class="btn mx-4" value="Red On" />
        <input id="greenOff" type="button" class="btn mx-4" value="Green Off" />
        <input id="greenOn" type="button" class="btn mx-4" value="Green On" />
    </div>
    <div class="col-6">

    </div>

</div>
<a href=" https://agent.electricimp.com/Dt8DLEVLvk8W?state=0">Switch Red off</a>
<a href=" https://agent.electricimp.com/Dt8DLEVLvk8W?state=1">Switch Red on</a>
<a href=" https://agent.electricimp.com/Dt8DLEVLvk8W?state=2">Switch Green off</a>
<a href=" https://agent.electricimp.com/Dt8DLEVLvk8W?state=3">Switch Green on</a>

</body>


<?php
$pathToPage = URLROOT.'Evaluation.php?week=1';
include 'View/Includes/Footer.php';
?>
