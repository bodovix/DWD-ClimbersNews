<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 12/10/2018
 * Time: 09:41
 */

class ArticleCategory
{
    private $con;


    public function __construct()
    {
        $this->con = ConnectionSingleton::Instance()->GetCon();
    }
    public function loadArticleCategories()
    {
        $query = $this->con->prepare("select distinct * 
                                        from sql1701267.articleCategory
                                        ORDER BY category desc");


        $success = $query->execute();

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
}