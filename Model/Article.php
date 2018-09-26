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

    public $id;
    public $headline;
    public $coverImage;
    public $category;
    public $description;

    public $primaryText;
    public $primaryMediaUrl;
    public $primaryMediaType;
    public $primaryMediaCaption;

    public $secondaryText;
    public $secondaryMediaUrl;
    public $secondaryMediaType;
    public $secondaryMediaCaption;

    public $conclusionText;
    public $conclusionMediaUrl;
    public $conclusionMediaType;
    public $conclusionMediaCaption;

    public $createdOn;
    public $statusCode;
    public $author;

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
            return $result;
        } else{
            return null;
        }
    }
    //TODO: delete
    //TODO: update


    //TODO: not sure about filtered methods, feel like web api should only have the 4 cruds

}