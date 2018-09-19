<?php

class IndexControl
{
    private $con;
    private $articlesPerPage;
    public function __construct($connection)
    {
        $this->con = ConnectionSingleton::Instance()->GetCon();
        $this->articlesPerPage = 6;
    }

    private function GetArticleDetails ($pageNumber){
//TODO: sort out proper prepared statements
        $pageOffsetStart = ($this->articlesPerPage * $pageNumber)- $this->articlesPerPage;
        $query = $this->con-> prepare("select imageUrl,headline,description 
                                        from sql1701267.article  
                                        ORDER BY createdOn 
                                        desc 
                                        LIMIT ".$this->articlesPerPage." 
                                        OFFSET ".$pageOffsetStart);

        $success = $query -> execute();

        if ($success){

            $result = $query -> fetchAll(PDO::FETCH_OBJ);
            return $result;
        } else{
            return null;
        }
    }
    private function DisplayPaging(){
        $query = $this->con-> prepare("select id from sql1701267.article");

        $success = $query -> execute();

        if ($success){
            $count = $query -> rowCount();
            $pagesRequired = $count / $this->articlesPerPage;
            $paginate = '<nav>';
            $paginate .= '<ul class="pagination pagination-lg>';
            for($i =0; $i <= $pagesRequired; $i++){
                $index = $i + 1;
                $paginate .= <<<EOT
                <li class="page-item">
                    <button class="page-link" onclick="">{$index}</button>
                </li>
EOT;
            }
            $paginate .= '</ul>';
            $paginate .= '</nav>';

            return $paginate;
        }else{
            return null;
        }


    }

    public function DisplayArticlesAsCards($pageNumber){
            $result = $this->GetArticleDetails($pageNumber);

            $html ="";
            $lastRowCreated =0;
        if (is_array($result) || is_object($result)) {
            foreach ($result as $key => $item) {
                if ($key == 0) {
                    //first row setup
                    $html .= '<div class="row">';
                    $lastRowCreated = $key;
                }
                if (($key - 3) == $lastRowCreated) {
                    //Add another Row
                    $html .= '<div class="row">';
                    $lastRowCreated = $key;
                }

                $html .=
                    <<<EOT
        <div class="col-md-4 bg-info">
            <div class="container mt-3">
                <div class="card" >
                    <img class="card-img-top img-fluid " src="{$item->imageUrl}" >
                    <div class="card-body">
                        <h4 class="card-title my-1">{$item->headline}"</h4>
                        <p class="card-text mb-1 text-muted" style="overflow:hidden;height: 50px ">{$item->description}</p>
                    </div>
                </div>
            </div>
        </div>
EOT;
                if (($key - 2) == $lastRowCreated) {
                    //close row
                    $html .= '</div>';
                } elseif (($key + 1) == count($result)) {
                    //otherwise check if exiting loop
                    $html .= '</div>';
                }
            }
            $html .= $this->DisplayPaging($result);
        }else{
            echo 'Failed to Load Articles. Pleas try again later.';
        }
            return $html;

    }
}

