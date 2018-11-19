<html>
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

<script src="View/JSHandlers/IndexJS.js"></script>

<body class="" >
<div id="recentArticleContainer" >
    <?php echo $indexControl->DisplayPageChangeArticlesAll(1); ?>
</div>

</body>




<?php
$pathToPage = URLROOT.'Evaluation.php?week=1';
include 'View/Includes/Footer.php';
?>
</html>

