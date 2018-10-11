<html>
<?php
require_once  'global/ConnectionSingleton.php';
require_once 'View/IndexControl.php';
require_once  'config/config.php';

?>
<?php
include_once 'Includes/Header.php';
include_once 'Includes/MyArticlesNav.php';
?>
<script src="View/JSHandlers/MyArticlesJS.js"></script>

<body >
<div class="row">
    <div class="container">
        <div id="uploadArticleContainer" class="h-100">

        </div>
    </div>
</div>
</body>

<?php
$pathToPage = URLROOT.'Evaluation.php?week=5';
include 'Includes/Footer.php';
?>
</html>

