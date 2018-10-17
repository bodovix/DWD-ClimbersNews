<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 21/09/2018
 * Time: 11:14
 */


include_once 'Model/ArticleCategory.php';



class SearchBarControl
{
    private  $articleCategoriesModel;
    private $con;
    public function __construct()
    {
        $this->articleCategoriesModel = new ArticleCategory();
        $this->con = ConnectionSingleton::Instance()->GetCon();
    }


    public function displayCategories(){
        $categories = json_decode($this->articleCategoriesModel->loadArticleCategories());

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


}