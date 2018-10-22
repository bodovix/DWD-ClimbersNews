<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 10/20/2018
 * Time: 4:29 PM
 */

class Feedback
{
    private $con;


    public function __construct()
    {
        $this->con = ConnectionSingleton::Instance()->GetCon();
    }

    public  function getFeedbackById($id){
        $query = $this->con-> prepare("select feedback,showOnSite,userId,article,feedback.createdOn as createdOn,forename from feedback 
                                                    left join article on article.id = feedback.article 
                                                    left join user on user.id = feedback.userId where feedback.id = :feedbackId");
        $success = $query -> execute(['feedbackId' => $id]);

        if ($success && $query -> rowCount() > 0){
            $result = $query -> fetch(PDO::FETCH_OBJ);
            if (!is_null($result)){
                $json = json_encode($result);
                return $json;
            }else{
                return null;
            }
        }else{
            return null;
        }
    }
    public function getAllFeedbackForArticle($id){
        $query = $this->con->prepare("select feedback.id as id, feedback,showOnSite,userId,article,feedback.createdOn as createdOn,forename from feedback 
                                                    left join article on article.id = feedback.article 
                                                    left join user on user.id = feedback.userId
                                                    where article.id = :articleId
                                                    order by createdOn desc ;");
        $success = $query->execute(['articleId' => $id]);

        if ($success) {
            if ($query->rowCount() > 0) {
                $result =  $query->fetchAll(PDO::FETCH_OBJ);
                return json_encode($result);
            } else {
                return null;
            }
        }else{
            return null;
        }
    }
    public function getActiveFeedbackForArticle($id){
        $query = $this->con->prepare("select feedback.id as id, feedback,showOnSite,userId,article,feedback.createdOn as createdOn,forename from feedback 
                                                    left join article on article.id = feedback.article 
                                                    left join user on user.id = feedback.userId
                                                    where article.id = :articleId
                                                    AND showOnSite = true
                                                    order by createdOn desc ;");
        $success = $query->execute(['articleId' => $id]);

        if ($success) {
            if ($query->rowCount() > 0) {
                $result =  $query->fetchAll(PDO::FETCH_OBJ);
                return json_encode($result);
            } else {
                return null;
            }
        }else{
            return null;
        }
    }

    public function AddFeedback($feedback,$showOnSite,$userId,$articleId){
        $createdOn = date('Y-m-d',strtotime("now"));
        $query = $this->con-> prepare("insert into feedback (createdOn,feedback,showOnSite,userId,article) 
                                                  value (:createdOn,:feedback,:showOnSite,:userId,:articleId);");
        $success = $query -> execute([
            'createdOn' =>  $createdOn,
            'feedback' =>  $feedback,
            'showOnSite' =>  $showOnSite,
            'userId' =>  $userId,
            'articleId' =>  $articleId
        ]);

        if ($success && $query -> rowCount() > 0){
            $last_id = $this->con->lastInsertId();
            $json = json_encode($last_id);
            return $json;
        }else{
            return json_encode(false);
        }
    }

    public  function deleteComment($id){
        $query = $this->con-> prepare("delete from feedback where id = :commentId;");
        $success = $query -> execute([
            'commentId' =>  $id
        ]);

        if ($success && $query -> rowCount() > 0){
            $json = json_encode(1);
            return $json;
        }else{
            return json_encode(0);
        }
    }
}