<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 26/09/2018
 * Time: 09:20
 */

class Article
{
    private $con;

     public function __construct()
     {
         $this->con = ConnectionSingleton::Instance()->GetCon();
     }

    public function getArticleById($id){
        $query = $this->con-> prepare("select * from article where id = :articleId");
        $success = $query -> execute(['articleId' => $id]);

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

    //TODO: get all
    public function GetAllArticleDetails (){

        $query = $this->con-> prepare("select id,coverImage,headline,description,createdOn 
                                        from sql1701267.article  
                                        ORDER BY createdOn 
                                        desc
                                        ");

        $success = $query -> execute();
        if ($success){
            $result = $query -> fetchAll(PDO::FETCH_OBJ);
            if (count($result) ==0){
                return null;
            }
            $json = json_encode($result);
            return $json;
        } else{
            return null;
        }
    }
    //TODO: Create
    //TODO: delete
    //TODO: update


    //TODO: not sure about filtered methods, feel like  api should be kept simple only have the 4 crud's. maybe this should be a string query to filter GetAll
    public function findArticleByDateCreated ($createdOn){

        if (is_null($createdOn) || !isset($createdOn)){
            return null;
        }
        $createdOnDate = date('Y-m-d',strtotime($createdOn));

        $query = $this->con-> prepare("select id,coverImage,headline,description ,createdOn
                                        from sql1701267.article
                                        WHERE article.createdOn = :createdOn
                                        ORDER BY article.createdOn desc");

        $success = $query -> execute(['createdOn' => $createdOnDate]);

        if ($success) {
            if ($query->rowCount() > 0){
                $result = $query->fetchAll(PDO::FETCH_OBJ);
                $json = json_encode($result);
                return $json;
            }else{
                return null;
            }
        }else{
            return null;
        }
    }
}