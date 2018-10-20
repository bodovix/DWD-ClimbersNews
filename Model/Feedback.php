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

    public function getAllFeedbackForArticle($id){
        $query = $this->con->prepare("select feedback,showOnSite,userId,article,feedback.createdOn,forename from feedback 
                                                    left join article on article.id = feedback.article 
                                                    left join user on user.id = feedback.userId
                                                    where article.id = :id;");
        $success = $query->execute(['id' => $id]);

        if ($success) {
            if ($query->rowCount() > 0) {
                $result =  $query->fetch(PDO::FETCH_OBJ);
                return json_encode($result);
            } else {
                return null;
            }
        }else{
            return null;
        }
    }
}