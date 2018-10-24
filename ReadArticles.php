<html>
<?php
require_once  'global/ConnectionSingleton.php';
require_once 'Controller/ReadArticlesControl.php';
require_once  'config/config.php';
include_once 'Model/Article.php';
include_once 'Model/User.php';
include_once 'Model/Rating.php';
include_once 'Model/Feedback.php';

$urlQueries = array();
parse_str($_SERVER['QUERY_STRING'], $urlQueries);

$relatedArticlesControl = new ReadArticlesControl();
?>
<?php
include_once 'View/Includes/Header.php';

?>
<script src="View/JSHandlers/ReadArticlesJS.js"></script>
<link rel="stylesheet" type="text/css" href="Resources/css/customStyles.css"/>
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
                <div id="articleRatingSystem" class="col font-weight-bold h3">
                    <span id="oneStarRating" class="starRatingIcon" data-value="1">&#x2605;</span>
                    <span id="twoStarRating" class="starRatingIcon" data-value="2">&#x2605;</span>
                    <span id="threeStarRating" class="starRatingIcon" data-value="3">&#x2605;</span>
                    <span id="fourStarRating" class="starRatingIcon" data-value="4">&#x2605;</span>
                    <span id="fiveStarRating" class="starRatingIcon" data-value="5">&#x2605;</span>
                </div>
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
            <div id="articleDisplayContainer">
                <?php echo $relatedArticlesControl->displayCommentsForArticle($urlQueries['article']) ?>
            </div>
        </div>
</div>



<?php
$pathToPage = URLROOT.'Evaluation.php?week=2';
include 'View/Includes/Footer.php';
?>
</html>

