<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 21/09/2018
 * Time: 11:14
 */





class SearchBarControl
{
    private $con;
    public function __construct()
    {
        $this->con = ConnectionSingleton::Instance()->GetCon();
    }


    public function displayCategories(){
        $categories = $this->loadArticleCategories();

        if (count($categories) > 0) {
            $html = null;
            $html .= '<select class="form-control mr-2" id="categorySearch" >';
            $html .= '<option value="">Category...</option>';

            foreach ($categories as $item) {
                $html .= '<option value="' . $item->category . '">' . $item->category . '</option>';
            }
            $html .= '</select>';

            return $html;
        }else{
            return 0;
        }
    }

    private function loadArticleCategories()
    {
        $query = $this->con->prepare("select distinct category 
                                        from sql1701267.articleCategory
                                        ORDER BY category desc");


        $success = $query->execute();

        if ($success) {
            if ($query->rowCount() > 0) {

                return $query->fetchAll(PDO::FETCH_OBJ);
            } else {
                return null;
            }
        }
    }
}