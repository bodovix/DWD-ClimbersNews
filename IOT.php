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
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<body>
    <div data-role="page">
        <div data-role="header">
            <h1>Electric Imp</h1>
        </div>
        <div data-role="main">
            <h3>Recent Readings</h3>
            <ul data-role="listview" id="recentReadingsUL">

            </ul>
        </div>
        <div data-role="footer">
            <?php
            $pathToPage = URLROOT.'Evaluation.php?week=9';
            include 'View/Includes/Footer.php';
            ?>
        </div>
    </div>
</body>


<?php
$pathToPage = URLROOT.'Evaluation.php?week=9';
include 'View/Includes/Footer.php';
?>
