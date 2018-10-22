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
    private $userModel;

    public function __construct()
    {
        $this->con = ConnectionSingleton::Instance()->GetCon();
        $this->articleModel = new Article();
        $this->feedbackModel = new Feedback();
        $this->userModel = new User();

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

    //TODO:Implement Comments
    public  function displayCommentsForArticle($articleID){
        $commentsJson = $this->feedbackModel->getActiveFeedbackForArticle($articleID);
        $comments = json_decode($commentsJson);

        $html = "";

        if ($comments != null){
             if (count($comments) > 0){
                foreach ($comments as $item){
                    $canEdit = false;
                    $canRemove = false;
                    if (isset($_SESSION['admin'])){
                        //Admin Logged In; Can Remove
                        $canRemove = true;
                    }
                    if (isset($_SESSION['userId'])){
                        if ($item->userId == $_SESSION['userId']){
                            //it's his comment; Can Edit
                            $canEdit = true;
                        }
                    }
                    $html .= $this->renderArticleComment($item->id,$item->forename,$item->createdOn,$item->feedback,$canEdit,$canRemove);
                }
            }
        }
        return $html;
    }
    private function renderArticleComment($commentId,$name,$date,$comment,$canEdit,$canRemove){
        $edit = "disabled";
        $remove ="disabled";

        if ($canEdit === true){
            $edit = "";
        }
        if ($canRemove === true){
            $remove = "";
        }

        $commentHtml = <<<EOT
 <div class="userComment border my-1 mx-1">
                <div class="row">
                    <div class="col text-info">{$name} - {$date}</div>
                </div>
                <button class="editCommentBtn btn btn-info p-1" {$edit}>Edit</button>
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

}
