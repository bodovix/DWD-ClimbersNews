<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 17/10/2018
 * Time: 16:10
 */

if(isset($_SESSION['author']) || isset($_SESSION['admin'])){
}else{
    echo '<script> alert("Authors Only.")</script>';
    header ("refresh:0;url=Index.php");
    exit();
}
