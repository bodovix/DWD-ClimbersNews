<html>
<?php
include_once  'global/ConnectionSingleton.php';
include_once  'Control/IndexControl.php';
include_once  'config/config.php';
$indexControl = new IndexControl();

?>
<?php
    include 'View/Header.php';
?>

<body class="">
<div class="container  ">

       <?php echo $indexControl->DisplayArticlesAsCards(1); ?>

</div>
</body>



</html>
<?php
$pathToPage = URLROOT.'Evaluation.php?week=1';
include 'View/Footer.php';
?>


