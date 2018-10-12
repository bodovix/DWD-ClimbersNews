<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 12/10/2018
 * Time: 09:07
 */
include_once 'Model/Article.php';

class MyArticlesControl
{
    private $con;
    private $articleModel;

    public function __construct()
    {
        $this->con = ConnectionSingleton::Instance()->GetCon();
        $this->articleModel = new Article();
    }
    
}