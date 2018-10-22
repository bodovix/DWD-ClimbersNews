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

    public function checkRatingAlreadyPlaced(){

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