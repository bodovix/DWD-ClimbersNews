<?php


class IndexControl
{
    private $con;
    public function __construct($connection)
    {
        $this->con = $connection;
    }

    public function GetArticles(){
        $query = $this->con-> prepare("select * from sql1701267.article ORDER BY createdOn desc ");

        $success = $query -> execute();
        if ($success){
            $result = $query -> fetchAll(PDO::FETCH_ASSOC);
            $html ="";
            foreach ($result as $item) {
                $html .=
                    <<<EOT

        <div class="col-md-4 bg-info">
            <div class="container mt-3">
                <div class="card" >
                    <img class="card-img-top img-fluid " src="{$item["imageUrl"]}" style="height: 200px;width: auto; overflow: hidden" >
                    <div class="card-body">
                        <h4 class="card-title my-1">{$item["headline"]}"</h4>
                        <p class="card-text mb-1 text-muted" style="overflow:hidden;height: 50px ">{$item["description"]}</p>
                    </div>
                </div>
            </div>
        </div>
EOT;
            }
            return $html;
        } else{
            return "";
        }
    }
}

