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

    public  function CreateArticle($headline,$category,$description,$primaryText,$coverImage,$primaryMediaUrl,$primaryMediaType,$primaryMediaCaption,$secondaryText,$secondaryMediaUrl,$secondaryMediaType,$secondaryMediaCaption,$conclusionText,$conclusionMediaUrl,$conclusionMediaType,$conclusionMediaCaption,$statusCode,$author){
         $query = $this->con-> prepare("insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,primaryMediaCaption,secondaryText,secondaryMediaUrl,secondaryMediaType,secondaryMediaCaption,conclusionText,conclusionMediaUrl,conclusionMediaType,conclusionMediaCaption,statusCode,author) 
                                                values(
                                        /*headline*/        		:headline
                                        /*category*/        		,:category
                                        /*description*/        		,:description
                                        /*primaryText*/       		,:primaryText
                                        /*coverImage*/				,:coverImage
                                        /*primaryMediaUrl*/			,:primaryMediaUrl
                                        /*primaryMediaType*/		,:primaryMediaType
                                        /*primaryMediaCaption*/		,:primaryMediaCaption
                                        /*secondaryText*/			,:secondaryText
                                        /*secondaryMediaUrl*/		,:secondaryMediaUrl
                                        /*secondaryMediaType*/		,:secondaryMediaType
                                        /*secondaryMediaCaption*/	,:secondaryMediaCaption
                                        /*conclusionText*/ 			,:conclusionText
                                        /*conclusionMediaUrl*/ 		,:conclusionMediaUrl
                                        /*conclusionMediaType*/ 	,:conclusionMediaType
                                        /*conclusionMediaCaption*/ 	,:conclusionMediaCaption
                                        /*statusCode*/				,:statusCode
                                        /*author*/					,:author
                                        );"
         );
        $success = $query -> execute([
            'headline' => $headline,
            'category' =>$category,
            'description' =>$description,
            'primaryText' =>$primaryText,
            'coverImage' =>$coverImage,
            'primaryMediaUrl' =>$primaryMediaUrl,
            'primaryMediaType' =>$primaryMediaType,
            'primaryMediaCaption' =>$primaryMediaCaption,
            'secondaryText' =>$secondaryText,
            'secondaryMediaUrl' =>$secondaryMediaUrl,
            'secondaryMediaType' =>$secondaryMediaType,
            'secondaryMediaCaption' =>$secondaryMediaCaption,
            'conclusionText' =>$conclusionText,
            'conclusionMediaUrl' =>$conclusionMediaUrl,
            'conclusionMediaType' =>$conclusionMediaType,
            'conclusionMediaCaption' =>$conclusionMediaCaption,
            'statusCode' =>$statusCode,
            'author' =>$author
            ]);

        if ($success && $query -> rowCount() > 0){
            $json = json_encode(true);
            return $json;
        }else{
            return json_encode(false);
        }
    }

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