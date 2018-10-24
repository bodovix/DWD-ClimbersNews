<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 22/10/2018
 * Time: 17:18
 */

class Rating
{
    private $con;

    public function __construct()
    {
        $this->con = ConnectionSingleton::Instance()->GetCon();
    }
    public  function getAverageRatingForArticle($articleId){
        $query = $this->con-> prepare("select avg(rating) as score from rating where article = :articleId");
        $success = $query -> execute(['articleId' => $articleId]);

        if ($success && $query -> rowCount() > 0){
            $result = $query -> fetch(PDO::FETCH_OBJ);
            if (!is_null($result)){
                $json = json_encode($result);
                return $json;
            }else{
                return json_encode(0);
            }
        }else{
            return json_encode(0);
        }
    }
    public function checkRatingAlreadyPlaced($articleId,$userId){
        $query = $this->con-> prepare("select id from rating where userId = :userId and article = :articleId;");
        $success = $query -> execute([
            'userId' =>  $userId,
            'articleId' =>  $articleId
        ]);

        if ($success && $query -> rowCount() > 0){
            //Rating Found
            $json = json_encode(true);
            return $json;
        }else{
            //No Ratings found
            return json_encode(false);
        }
    }

    public  function createRating($rating,$userId,$articleId){
        $createdOn = date('Y-m-d',strtotime("now"));
        $query = $this->con-> prepare("insert into rating (createdOn,rating,userId,article) 
                                                  value (:createdOn,:rating,:userId,:articleId);");
        $success = $query -> execute([
            'createdOn' =>  $createdOn,
            'rating' =>  $rating,
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

}