<html>
<?php
require_once  'global/ConnectionSingleton.php';
require_once 'View/IndexControl.php';
require_once  'config/config.php';

?>
<?php
include_once 'Includes/Header.php';
?>
<script src="View/JSHandlers/IndexJS.js"></script>

<body >
<div class="row">

    <div id="uploadArticleContainer" class="h-100">
        <div class="container">
            <div class="form">
                <div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


</body>




<?php
$pathToPage = URLROOT.'Evaluation.php?week=5';
include 'Includes/Footer.php';
?>
</html>

