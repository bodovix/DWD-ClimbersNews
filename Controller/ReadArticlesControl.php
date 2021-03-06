<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class ReadArticlesControl
{
    public  $isDisabledBtn;
    private $con;
    private $articleModel;
    private $feedbackModel;
    private $ratingModel;
    private $userModel;

    public function __construct()
    {
        $this->con = ConnectionSingleton::Instance()->GetCon();
        $this->articleModel = new Article();
        $this->feedbackModel = new Feedback();
        $this->userModel = new User();
        $this->ratingModel = new Rating();

        if ($this->isLoggedIn()){
            $this->isDisabledBtn = "";
        }else{
            $this->isDisabledBtn = "disabled";
        }
    }
    private function isLoggedIn(){
        if (isset($_SESSION['userId'])){
            return true;
        }else{
            return false;
        }
    }

    private  function  addMedia($mediaUrl,$mediaCaption,$mediaType){
        $output = '';
        switch ($mediaType){
            case 'none':
                    //render nothing as section is just text

                break;
            case 'image':

                $output = <<<EOT
<div class="col-md-10 offset-md-1">
                <div class="thumbnail ">
                    <img src="{$mediaUrl}" alt="Image not found." style="width:100%">
                    <div class="caption">
                        <p class="text-center">{$mediaCaption}</p>
                    </div>
                </div>
            </div>
EOT;
                break;
            case 'video':
                $output = <<<EOT
                    <video class="col-md-10 offset-md-1" controls>
                        <source src="{$mediaUrl}" type="video/mp4"/>Video not supported.
                    </video>
EOT;
                break;
            case 'audio':
                $output = <<<EOT
                    <audio class="col-md-10 offset-md-1" controls>
                      <source src="{$mediaUrl}" type="audio/ogg">
                      <source src="{$mediaUrl}" type="audio/mpeg">
                      <source src="{$mediaUrl}" type="audio/wav">
                      Your browser does not support the audio element.
                    </audio>
EOT;
                break;
        }

            return $output;
    }

    public function formatArticle($id){
        $articleToFormat = json_decode($this->articleModel->getArticleById($id));
        if (isset($articleToFormat)) {
            $html ="";
                    //first loop
                    $html .= <<<EOT
            <div class="row">
                <div class="col">
                    <h1 id="title" class="text-center">{$articleToFormat->headline}</h1>
                    <h3 class="text-muted text-center">{$articleToFormat->description}</h3>
                    {$this->addMedia($articleToFormat->primaryMediaUrl,$articleToFormat->primaryMediaCaption,$articleToFormat->primaryMediaType)}
                    <p class="text-center  text-justify">{$articleToFormat->primaryText}</p>
                
                     {$this->addMedia($articleToFormat->secondaryMediaUrl,$articleToFormat->secondaryMediaCaption,$articleToFormat->secondaryMediaType)}
                    <p class="text-center  text-justify">{$articleToFormat->secondaryText}</p>
                    
                     {$this->addMedia($articleToFormat->conclusionMediaUrl,$articleToFormat->conclusionMediaCaption,$articleToFormat->conclusionMediaType)}
                    <p class="text-center  text-justify">{$articleToFormat->conclusionText}</p>
               </div>
           </div>
EOT;

                return $html;

        }else{
            return 'Failed to Load Article';
        }
    }

    public  function displayCommentsForArticle($articleID){
        $commentsJson = $this->feedbackModel->getActiveFeedbackForArticle($articleID);
        $comments = json_decode($commentsJson);

        $html = "";

        if ($comments != null){
             if (count($comments) > 0){
                foreach ($comments as $item){
                    $canRemove = false;
                    if (isset($_SESSION['admin'])){
                        //Admin Logged In; Can Remove
                        $canRemove = true;
                    }
                    $html .= $this->renderArticleComment($item->id,$item->forename,$item->createdOn,$item->feedback,$canRemove);
                }
            }
        }
        return $html;
    }
    private function renderArticleComment($commentId,$name,$date,$comment,$canRemove){
        $remove ="disabled";

        if ($canRemove === true){
            $remove = "";
        }

        $commentHtml = <<<EOT
 <div class="userComment border my-1 mx-1">
                <div class="row">
                    <div class="col text-info">{$name} - {$date}</div>
                </div>
                <button class="removeCommentBtn btn btn-info p-1" {$remove}>Remove</button>
                <input class="commentId" type="text" value="{$commentId}" hidden/>
                <div class="row">
                    <div class="col-12">{$comment}</div>
                </div>
            </div>
EOT;
    return $commentHtml;
    }

    public function addComment($feedback,$showOnSite,$userId,$articleId){
        $resultJsn = $this->feedbackModel->AddFeedback($feedback,$showOnSite,$userId,$articleId);
        $result = json_decode($resultJsn);

        if ($result != false){
            //Success
            $user = json_decode($this->userModel->getUserById($userId));
            if($user->userRole == 'admin'){
                $canRemove = true;
            }else{
                $canRemove = false;
            }
            $date = date('Y-m-d');
            $commentToReturn = $this->renderArticleComment($result,$user->forename,$date,$feedback,true,$canRemove);
            return $commentToReturn;
        }else{
            //Error
            return "";
        }
    }
    public  function  removeComment($commentId){
        //check is admin
        if (!isset($_SESSION['admin'])){
            return "Only Admin can remove comments.";
        }
        //remove comment
        $deleted =  json_decode($this->feedbackModel->toggleShowOnSite($commentId,false));
        if ($deleted > 0){
            //Success
            return "";
        }else{
            //Error
            return "Error removing comment. Please contact support";
        }
    }

    public function setRatingOnArticle($rating,$articleId,$userId){
        //validate Rating Range
        if ($rating == '1' ||$rating == '2' ||$rating == '3' ||$rating == '4' ||$rating == '5'){
            //valid
        }else{
            //error
            return "Invalid Rating";
        }

        //check is logged in
        if (!isset($_SESSION['userId'])){
            return "Not logged in";
        }
        //check not already voted
        $alreadyRated = json_decode($this->ratingModel->checkRatingAlreadyPlaced($articleId,$userId));

        if ($alreadyRated == 1){
            return "Already Voted.";
        }
        //vote
        $created = json_decode($this->ratingModel->createRating($rating,$userId,$articleId));
        if ($created > 0){
            $newAverage = json_decode($this->ratingModel->getAverageRatingForArticle($articleId));
            return $newAverage;
        }else{
            return "Error; please contact support";
        }
    }
    public function displayArticleRating($articleId){
        $average = json_decode($this->ratingModel->getAverageRatingForArticle($articleId));

            $five ="";
            $four = "";
            $three = "";
            $two = "";
            $one = "";
        if ($average >= 4.5){
            $five = "rated";
            $four = "rated";
            $three = "rated";
            $two = "rated";
            $one = "rated";
        }
        else if ($average >= 3.5){
            $four = "rated";
            $three = "rated";
            $two = "rated";
            $one = "rated";
        }
        else if($average >=2.5){
            $three = "rated";
            $two = "rated";
            $one = "rated";
        }
        else if ($average >=1.5){
            $two = "rated";
            $one = "rated";
        }else if($average >=0.5){
            $one = "rated";
        }

        $ratingDisplay = <<<EOT
<div id="articleRatingSystem" class="col font-weight-bold h3">
                    <span id="oneStarRating" class="starRatingIcon {$one}" data-value="1">&#x2605;</span>
                    <span id="twoStarRating" class="starRatingIcon {$two}" data-value="2">&#x2605;</span>
                    <span id="threeStarRating" class="starRatingIcon {$three}" data-value="3">&#x2605;</span>
                    <span id="fourStarRating" class="starRatingIcon {$four}" data-value="4">&#x2605;</span>
                    <span id="fiveStarRating" class="starRatingIcon {$five}" data-value="5">&#x2605;</span>
                </div>
EOT;
        return $ratingDisplay;
    }
}
