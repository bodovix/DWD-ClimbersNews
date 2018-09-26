<html>
<?php
require_once  'global/ConnectionSingleton.php';
require_once 'View/IndexControl.php';
require_once  'config/config.php';

$indexControl = new IndexControl();

?>
<?php
    include_once 'Includes/Header.php';
    include_once 'Includes/SearchBar.php';
?>
<script src="View/JSHandlers/IndexJS.js"></script>

<body class="" >
<div id="recentArticleContainer" >
    <?php echo $indexControl->DisplayPageChangeArticlesAll(1); ?>
</div>

</body>




<?php
$pathToPage = URLROOT.'Evaluation.php?week=1';
include 'Includes/Footer.php';
?>
</html>

