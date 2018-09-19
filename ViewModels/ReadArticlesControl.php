<?php

class ReadArticlesControl
{
    private $con;
    private $articleID;
    public function __construct($articleID)
    {
        $this->articleID = $articleID;
        $this->con = ConnectionSingleton::Instance()->GetCon();
    }

    public function getArticleById($id){
        $query = $this->con-> prepare("select * from article where id =".$this->articleID);

        $success = $query -> execute();
        if ($success && $query -> rowCount() > 0){
            $result = $query -> fetch(PDO::FETCH_OBJ);
            return $result;
        }else{
            return null;
        }
    }

    public function formatArticle($id){
        $articleToFormat = $this->getArticleById($id);
        if (isset($articleToFormat) > 0) {
            $html ="";
                    //first loop
                    $html .= <<<EOT
            <div class="row">
            <div class="col">
            <h1 id="title" class="text-center">{$articleToFormat->headline}</h1>
            <div class="col-md-10 offset-md-1">
                <div class="thumbnail ">
                    <img src="{$articleToFormat->primaryImageUrl}" alt="Image not found." style="width:100%">
                    <div class="caption">
                        <p class="text-center">{$articleToFormat->primaryImageCaption}</p>
                    </div>
                </div>
            </div>
            <h3 class="text-muted text-center">{$articleToFormat->description}</h3>
            <p class="text-center  text-justify">{$articleToFormat->primaryText}</p>
        
           </div>
           </div>
EOT;

                return $html;

        }else{
            return 'Failed to Load Article';
        }
    }
}
