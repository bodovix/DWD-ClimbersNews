<html>
<?php
require_once  'global/ConnectionSingleton.php';
require_once 'ViewModels/IndexControl.php';
require_once  'config/config.php';

$indexControl = new IndexControl();

?>
<?php
    include_once 'View/Header.php';
    include_once 'View/SearchBar.php';
?>
<script src="ViewModels/JSHandlers/IndexJS.js"></script>

<body class="" >
<div id="recentArticleContainer" >
    <?php echo $indexControl->DisplayArticlesAsCards(1); ?>
</div>
<div id="paginator">
    <?php echo $indexControl->DisplayPaging(); ?>
</div>
</body>




<?php
$pathToPage = URLROOT.'Evaluation.php?week=1';
include 'View/Footer.php';
?>
</html>

