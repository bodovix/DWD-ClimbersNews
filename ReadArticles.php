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
<div class="container">
    <div id="articleDisplayArea" class="mx-auto">
        <?php
        if (isset($urlQueries['article'])) {
            echo $relatedArticlesControl->formatArticle($urlQueries['article']);
        }
        ?>
    </div>
</div>



<?php
$pathToPage = URLROOT.'Evaluation.php?week=2';
include 'View/Footer.php';
?>
</html>

