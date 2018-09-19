<html>
<?php
require_once  'global/ConnectionSingleton.php';
require_once 'ViewModels/ReadArticlesControl.php';
require_once  'config/config.php';


$urlQueries = array();
parse_str($_SERVER['QUERY_STRING'], $urlQueries);
$relatedArticlesControl = new ReadArticlesControl($urlQueries['article']);
?>
<?php
include 'View/Header.php';
?>
<div id="articleDisplayArea" class="mx-auto">
    <?php   echo $relatedArticlesControl->formatArticle($urlQueries['article']); ?>
</div>


<?php
$pathToPage = URLROOT.'Evaluation.php?week=2';
include 'View/Footer.php';
?>
</html>
