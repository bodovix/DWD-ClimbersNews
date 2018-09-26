<?php
 include_once 'Model/Article.php';
class IndexControl
{
    private $con;
    private $articlesPerPage;
    private $articleModel;
    private $loadedArticles;

    public function __construct()
    {
        $this->con = ConnectionSingleton::Instance()->GetCon();
        $this->articlesPerPage = 6;
        $this->articleModel = new Article();
        $this->loadedArticles = $this->articleModel->GetAllArticleDetails();
    }


    private function findArticleByDateCreated ($createdOn){

        if (is_null($createdOn) || !isset($createdOn)){
            return null;
        }
        $createdOnDate = date('Y-m-d',strtotime($createdOn));

        $query = $this->con-> prepare("select id,coverImage,headline,description 
                                        from sql1701267.article
                                        WHERE article.createdOn = :createdOn
                                        ORDER BY article.createdOn desc");


        $success = $query -> execute(['createdOn' => $createdOnDate]);

        if ($success) {
            if ($query->rowCount() > 0){

                return $query->fetchAll(PDO::FETCH_OBJ);
            }else{
                return null;
            }
        }else{
            return null;
        }
    }


    public function DisplayPageChangeArticlesAll($pageNumber){

            return $this->DisplayArticlesAsCards($pageNumber,FALSE);
    }

    public function DisplayPageChangeArticlesFiltered($pageNumber,$dateCreated){
        $this->loadedArticles = $this->findArticleByDateCreated($dateCreated);
        return $this->DisplayArticlesAsCards($pageNumber,TRUE);
    }

    private function DisplayArticlesAsCards($pageNumber,$isFiltered){
            $result = $this->loadedArticles;
            $html = null;
            $lastRowCreated =0;

        if ((is_array($result) || is_object($result)) && !is_null($result)) {
            $pageOffsetStart = ($this->articlesPerPage * $pageNumber)- $this->articlesPerPage;
            //Display Article Cards
            for($i = $pageOffsetStart ; $i < ($pageOffsetStart + $this->articlesPerPage); $i++){

                if (isset($result[$i]->id)) {
                    if ($i == $pageOffsetStart) {
                        //first row setup
                        $html = '<div class="row bg-info pb-2">';
                        $lastRowCreated = $i;
                    }
                    if (($i - 3) == $lastRowCreated) {
                        //Add another Row
                        $html .= '<div class="row bg-info pb-2">';
                        $lastRowCreated = $i;
                    }
                    $html .=
                        <<<EOT
        <div class="col-md-4">
            <div class="container mt-3">
            <a href="ReadArticles.php?article={$result[$i]->id}">
                <div class="card" >
                    <img class="card-img-top img-fluid " src="{$result[$i]->coverImage}" >
                    <div class="card-body">
                        <h4 class="card-title my-1">{$result[$i]->headline}"</h4>
                        <p class="card-text mb-1 text-muted" style="overflow:hidden;max-height: 50px ">{$result[$i]->description}</p>
                        <p class="card-text mb-1 text-muted float-right" style="overflow:hidden;max-height: 50px ">{$result[$i]->createdOn}</p>

                    </div>
                </div>
             </a>   
            </div>
        </div>
EOT;
                    if (($i - 2) == $lastRowCreated) {
                        //close row
                        $html .= '</div>';
                    }elseif (($i + 1) == count($result)){
                        //end of results, close row
                        $html .= '</div>';
                    } elseif ($i == (($pageOffsetStart + $this->articlesPerPage)-1)) {
                        //otherwise check if exiting loop because of 6 reached
                        $html .= '</div>';
                    }
                }
            }

            //----------Add Pagination
            $count = count($result);
            $pagesRequired = $count / $this->articlesPerPage;
            $paginate = '<div class="row mt-3">';
            $paginate .= '<div id="paginator">';
            $paginate .= '<div class="container">';
            $paginate .= '<nav>';
            $paginate .= '<ul class="pagination pagination-lg">';
            for($i =0; $i < $pagesRequired; $i++){
                $index = $i + 1;
                if ($isFiltered === FALSE) {
                    $paginate .= <<<EOT
                <li class="page-item">
                    <button class="page-link articlePager" value="{$index}">{$index}</button>
                </li>
EOT;
                }else{
                    $paginate .= <<<EOT
                <li class="page-item">
                    <button class="page-link articlePagerFiltered" value="{$index}">{$index}</button>
                </li>
EOT;
                }
            }
            $paginate .= '</ul>';
            $paginate .= '</nav>';
            $paginate .= '</div>';
            $paginate .= '</div>';
            $paginate .= '</div>';

                    $html .= $paginate;


            //=================
            if (!is_null($html)){
                return $html;
            }else{
                return 0;
            }
        }else{
            return 0;
        }


    }

}

