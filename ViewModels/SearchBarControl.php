<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 21/09/2018
 * Time: 11:14
 */





class SearchBarControl
{
    private $title;
    private $category;
    private $createdOn;

    public function __construct()
    {
        if (isset($_POST['titleSearch'])) {
            $this->title = $_POST['titleSearch'];
        }else{
            $this->title = '';
        }
        if (isset($_POST['categorySearch'])) {
            $this->category = $_POST['categorySearch'];
        }else{
            $this->category = '';
        }
        if (isset($_POST['createdOnSearch'])) {
            $this->createdOn = $_POST['createdOnSearch'];
        }else{
            $this->createdOn = '';
        }
    }




}