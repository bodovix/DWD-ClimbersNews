<?php


class IndexControl
{
    private $con;
    public function __construct($connection)
    {
        $this->con = $connection;
    }

    private function GetArticleDetails (){
        $query = $this->con-> prepare("select imageUrl,headline,description from sql1701267.article ORDER BY createdOn desc ");
        $success = $query -> execute();
        if ($success){
            $result = $query -> fetchAll(PDO::FETCH_OBJ);

            return $result;
        } else{
            return "";
        }
    }

    public function DisplayArticlesAsCards(){
            $result = $this->GetArticleDetails();
            $html ="";
            $lastRowCreated =0;
            foreach ($result as $key => $item) {
                if($key ==0){
                    //first row setup
                    $html .= '<div class="row h-auto" style="height: 300px;">';
                    $lastRowCreated = $key;
                }
                if(($key- 3) == $lastRowCreated){
                    //Add another Row
                    $html .= '<div class="row h-auto" style="height: 300px;">';
                    $lastRowCreated = $key;
                }

                $html .=
                    <<<EOT
        <div class="col-md-4 bg-info">
            <div class="container mt-3">
                <div class="card" >
                    <img class="card-img-top img-fluid " src="{$item->imageUrl}" style="height: 200px;width: auto; overflow: hidden" >
                    <div class="card-body">
                        <h4 class="card-title my-1">{$item->headline}"</h4>
                        <p class="card-text mb-1 text-muted" style="overflow:hidden;height: 50px ">{$item->description}</p>
                    </div>
                </div>
            </div>
        </div>
EOT;
                if(($key- 2) == $lastRowCreated){
                    //close row
                    $html .= '</div>';
                }elseif(($key+1) == count($result)){
                    //otherwise check if exiting loop
                    $html .= '</div>';
                }
            }
            return $html;

    }
}

