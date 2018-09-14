<html>
<?php
include_once  'global/ConnectionSingleton.php';
include_once  'Control/IndexControl.php';
include_once  'config/config.php';
$indexControl = new IndexControl(ConnectionSingleton::Instance()->GetCon());

?>
<?php
    include 'View/Header.php';
    //include_once 'global/dbConnect.php';
?>

<body class="">
<div class="container  ">
    <div class="row h-auto" style="height: 300px;">
       <?php echo $indexControl->GetArticles(); ?>
    </div>
</div>
</body>



</html>
<?php
$pathToPage = URLROOT.'Evaluation.php?week=1';
include 'View/Footer.php';
?>


