<html>
<?php
require_once  'global/ConnectionSingleton.php';
require_once 'Controller/ReadArticlesControl.php';
require_once  'config/config.php';
include_once 'Model/Article.php';
include_once 'Model/Feedback.php';

$urlQueries = array();
parse_str($_SERVER['QUERY_STRING'], $urlQueries);

$relatedArticlesControl = new ReadArticlesControl();
?>
<?php
include_once 'View/Includes/Header.php';

?>
<script src="View/JSHandlers/ReadArticlesJS.js"></script>

<div class="container">
       <div id="articleDisplayArea" class="col-12 mx-auto">
           <input id="articleID" hidden value="<?php echo $urlQueries['article']; ?>" />
        <?php
        if (isset($urlQueries['article'])) {
            echo $relatedArticlesControl->formatArticle($urlQueries['article']);
        }
        ?>
        </div>
        <div id="articleCommentsArea" class="col-12 border ">
            <div class="row">
                <div class="col font-weight-bold">comments</div>
                <div class="col-3 font-weight-bold">****</div>
            </div>

            <div class="addComment border my-1 mx-1">
                <div class="row">
                    <div class="container">
                        <button id="addCommentBtn" class=" btn btn-success p-1 m-2" <?php echo $relatedArticlesControl->isDisabledBtn ?>>Add Comment</button>
                        <div id="addCommentAlert" class="alert d-none"></div>
                        <textarea id="feedbackTxt" name="feedbackTxt" class="col-11 mx-auto" placeholder="Comment"></textarea>
                    </div>
                </div>
            </div>
            <?php echo $relatedArticlesControl->displayCommentsForArticle($urlQueries['article']) ?>
        </div>
</div>



<?php
$pathToPage = URLROOT.'Evaluation.php?week=2';
include 'View/Includes/Footer.php';
?>
</html>

