<?php

class IndexControl
{
    private $con;
    private $articlesPerPage;
    private $loadedArticles;

    public function __construct()
    {
        $this->con = ConnectionSingleton::Instance()->GetCon();
        $this->articlesPerPage = 6;
        $this->loadedArticles = $this->GetAllArticleDetails();
    }

    private function GetAllArticleDetails (){
//TODO: sort out proper prepared statements
        $query = $this->con-> prepare("select id,coverImage,headline,description 
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

    private function findArticleByDateCreated ($createdOn){
    //TODO: sort out proper prepared statements
        if (is_null($createdOn) || !isset($createdOn)){
            return null;
        }
        $createdOnDate = date('Y-m-d',strtotime($createdOn));

        $query = $this->con-> prepare("select id,coverImage,headline,description 
                                        from sql1701267.article
                                        WHERE article.createdOn = '".$createdOnDate."'
                                        ORDER BY article.createdOn desc");


        $success = $query -> execute();

        if ($success) {
            if ($query->rowCount() > 0){

                $this->loadedArticles = $query->fetchAll(PDO::FETCH_OBJ);
                    echo $this->DisplayArticlesAsCards(1);
            }else{
                echo null;
            }
        }
    }


    public function DisplayPageChangeArticlesAll($pageNumber){

            return $this->DisplayArticlesAsCards($pageNumber);
    }

    public function DisplayPageChangeArticlesFiltered($pageNumber,$dateCreated){
        $this->loadedArticles = $this->findArticleByDateCreated($dateCreated);
        return $this->DisplayArticlesAsCards($pageNumber);
    }

    private function DisplayArticlesAsCards($pageNumber){
            $result = $this->loadedArticles;
            $html = null;
            $lastRowCreated =0;

        if ((is_array($result) || is_object($result)) && !is_null($result)) {
            $pageOffsetStart = ($this->articlesPerPage * $pageNumber)- $this->articlesPerPage;
            //Display Article Cards
            for($i = $pageOffsetStart ; $i < ($pageOffsetStart + $this->articlesPerPage); $i++){

                if (isset($result[$i]->id)) {
                    if ($i == 0) {
                        //first row setup
                        $html = '<div class="row">';
                        $lastRowCreated = $i;
                    }
                    if (($i - 3) == $lastRowCreated) {
                        //Add another Row
                        $html .= '<div class="row">';
                        $lastRowCreated = $i;
                    }
                    $html .=
                        <<<EOT
        <div class="col-md-4 bg-info">
            <div class="container mt-3">
            <a href="ReadArticles.php?article={$result[$i]->id}">
                <div class="card" >
                    <img class="card-img-top img-fluid " src="{$result[$i]->coverImage}" >
                    <div class="card-body">
                        <h4 class="card-title my-1">{$result[$i]->headline}"</h4>
                        <p class="card-text mb-1 text-muted" style="overflow:hidden;max-height: 50px ">{$result[$i]->description}</p>
                    </div>
                </div>
             </a>   
            </div>
        </div>
EOT;
                    if (($i - 2) == $lastRowCreated) {
                        //close row
                        $html .= '</div>';
                    } elseif (($i + 1) == count($result)) {
                        //otherwise check if exiting loop
                        $html .= '</div>';
                    }
                }
            }
            //----------Add Pagination
            $count = count($result);
            $pagesRequired = $count / $this->articlesPerPage;
            $paginate = '<div id="paginator">';
            $paginate .= '<div class="row mt-3">';
            $paginate .= '<div class="container">';
            $paginate .= '<nav>';
            $paginate .= '<ul class="pagination pagination-lg">';
            for($i =0; $i <= $pagesRequired; $i++){
                $index = $i + 1;
                $paginate .= <<<EOT
                <li class="page-item">
                    <button class="page-link articlePager" value="{$index}">{$index}</button>
                </li>
EOT;
            }
            $paginate .= '</ul>';
            $paginate .= '</nav>';
            $paginate .= '</div>';
            $paginate .= '</div>';
            $paginate .= '</div>';

                    $html .= $paginate;


            //=================
            return $html;
        }else{
            return null;
        }


    }

}

