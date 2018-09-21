<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 21/09/2018
 * Time: 11:14
 */





class SearchBarControl
{
    private $title;
    private $category;
    private $createdOn;

    public function __construct()
    {
        if (isset($_POST['titleSearch'])) {
            $this->title = $_POST['titleSearch'];
        }else{
            $this->title = '';
        }
        if (isset($_POST['categorySearch'])) {
            $this->category = $_POST['categorySearch'];
        }else{
            $this->category = '';
        }
        if (isset($_POST['createdOnSearch'])) {
            $this->createdOn = $_POST['createdOnSearch'];
        }else{
            $this->createdOn = '';
        }
    }


    private function findArticle ($articleTitle,$Category,$CreateOn){
//TODO: sort out proper prepared statements
        $query = $this->con-> prepare("select id,coverImage,headline,description 
                                        from sql1701267.article
                                        WHERE article.headline  like '%".$articleTitle."%'
                                            and article.category  like '%".$Category."%'
                                            and article.createdOn = .$CreateOn
                                        ORDER BY createdOn desc");

        $success = $query -> execute();

        if ($success){

            $result = $query -> fetchAll(PDO::FETCH_OBJ);
            return $result;
        } else{
            return null;
        }
    }

}