<html>
<header>
<?php
    include 'View/Header.php';
    //include_once 'global/dbConnect.php';
include_once  'global/ConnectionSingleton.php';
include_once  'Control/IndexControl.php';

$indexControl = new IndexControl(ConnectionSingleton::Instance()->GetCon());

?>
</header>
<body class="">
<div class="container">
    <div class="row" style="height: 300px;">
       <?php echo $indexControl->GetArticles(); ?>
    </div>
</div>
</body>
<footer class="fixed-bottom">
<?php
    $pathToPage = 'TODO: CREATE PAGE';
    include 'View/Footer.php';
?>
</footer>
</html>


