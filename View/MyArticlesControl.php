<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../Model/Article.php';
require_once '../../Model/ArticleCategory.php';
require_once  '../../global/ConnectionSingleton.php';
require_once '../../config/config.php';
class MyArticlesControl
{
    private $con;
    private $articleModel;
    private $articleCategory;

    public function __construct()
    {
        $this->con = ConnectionSingleton::Instance()->GetCon();
        $this->articleModel = new Article();
        $this->articleCategory = new ArticleCategory();
    }
    public function DisplayArticleCategoriesAsOptionSet($selectInputFormID){
        $categories = json_decode($this->articleCategory->loadArticleCategories());
        if($categories != null){

            if (count($categories) > 0) {
                $html = null;
                $html .= '<select class="form-control mr-2" name="'.$selectInputFormID.'" id="'.$selectInputFormID.'" >';
                $html .= '<option value="">Category...</option>';

                foreach ($categories as $item) {
                    $html .= '<option value="' . $item->id . '">' . $item->category . '</option>';
                }
                $html .= '</select>';

                return $html;
            }else{
                return "";
            }
        }else{
            return "";
        }
    }

    private function validateArticleInput($headline, $coverImage, $category, $description, $pText, $pUrl, $pType, $pCapt,$sText,$sUrl,$sType,$sCapt,$cText,$cUrl,$cType,$cCapt){
        $isValid = "test";
        //are required fields set
        //are conditional required fields set

        //are files valid (if sent
        return $isValid;
    }
    public  function AddArticle($headline, $coverImage, $category, $description, $pText, $pUrl, $pType, $pCapt,$sText,$sUrl,$sType,$sCapt,$cText,$cUrl,$cType,$cCapt){
        $validateMsg = $this->validateArticleInput($headline, $coverImage, $category, $description, $pText, $pUrl, $pType, $pCapt,$sText,$sUrl,$sType,$sCapt,$cText,$cUrl,$cType,$cCapt);
        if ($validateMsg != ""){
            //Invalid
            return $validateMsg;
        }else{
            //Add Article
            return "valid";//TODO: upload and add to DB
        }
    }
}