<?php

require_once "../global/dbConnect.php";




class IndexControl
{
    private $con;
   public function LoadArticleCard($con){
        $articlesToShow[] = $this->GetAllArticles($con);
        foreach ($articlesToShow as $article ){

        }
   }

   private  function GetAllArticles($con)
   {
       $query = $con->prepare("select * from sql1701267.article ORDER BY createdOn DESC ");

       $success = $query->execute([]);
       if ($success) {
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
       }
       return $result;

   }

   public function __construct($conection)
   {
       $this->con = $conection;
   }
}