<html>
<?php
require_once  'global/ConnectionSingleton.php';
require_once 'Controller/ReadArticlesControl.php';
require_once  'config/config.php';


$urlQueries = array();
parse_str($_SERVER['QUERY_STRING'], $urlQueries);

$relatedArticlesControl = new ReadArticlesControl();
?>
<?php
include_once 'View/Includes/Header.php';

?>
<div class="container">
       <div id="articleDisplayArea" class="col-12 mx-auto">
        <?php
        if (isset($urlQueries['article'])) {
            echo $relatedArticlesControl->formatArticle($urlQueries['article']);
        }
        ?>
        </div>
        <div id="articleCommentsArea" class="col-12 border ">
            <div class="row">
                <div class="col font-weight-bold">comments</div>
                <button class="btn btn-info p-1" <?php echo $relatedArticlesControl->isDisabledBtn ?>>Add Comment</button>
                <div class="col-3 font-weight-bold">****</div>
            </div>
            <?php echo $relatedArticlesControl->displayCommentsForArticle($urlQueries['article']) ?>
        </div>
</div>



<?php
$pathToPage = URLROOT.'Evaluation.php?week=2';
include 'View/Includes/Footer.php';
?>
</html>

