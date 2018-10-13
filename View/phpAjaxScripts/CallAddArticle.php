<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 13/10/2018
 * Time: 09:50
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../Model/Article.php';
require_once  '../../config/config.php';
require_once '../MyArticlesControl.php';

//Check all fields sent via post
//header
if (!isset($_POST['addArticleHeader'])){
    return;
}
if (!isset($_POST['addCoverImage'])){
    return;
}
if (!isset($_POST['addArticleCategory'])){
    return;
}
if (!isset($_POST['addArticleDescription'])){
    return;
}
//primary
if (!isset($_POST['addPrimaryText'])){
    return;
}
if (!isset($_POST['addPrimaryMediaType'])){
    return;
}
if (!isset($_POST['addPrimaryUpload'])){
    return;
}
if (!isset($_POST['addPrimaryCaption'])){
    return;
}
//Secondary
if (!isset($_POST['addSecondaryText'])){
    return;
}
if (!isset($_POST['addSecondaryMediaType'])){
    return;
}
if (!isset($_POST['addSecondaryUpload'])){
    return;
}
if (!isset($_POST['addSecondaryCaption'])){
    return;
}
//Conclusion
if (!isset($_POST['addConclusionText'])){
    return;
}
if (!isset($_POST['addConclusionMediaType'])){
    return;
}
if (!isset($_POST['addConclusionUpload'])){
    return;
}
if (!isset($_POST['addConclusionCaption'])){
    return;
}

$header = strip_tags($_POST['addArticleHeader']);
$coverImg = strip_tags($_POST['addCoverImage']);
$articleCat = strip_tags($_POST['addArticleCategory']);
$desc = strip_tags($_POST['addArticleDescription']);

$pText = strip_tags($_POST['addPrimaryText']);
$pType = strip_tags($_POST['addPrimaryMediaType']);
$pUrl = strip_tags($_POST['addPrimaryUpload']);
$pCapt = strip_tags($_POST['addPrimaryCaption']);

$sText = strip_tags($_POST['addSecondaryText']);
$sType = strip_tags($_POST['addSecondaryMediaType']);
$sUrl = strip_tags($_POST['addSecondaryUpload']);
$sCapt = strip_tags($_POST['addSecondaryCaption']);

$cText = strip_tags($_POST['addConclusionText']);
$cType = strip_tags($_POST['addConclusionMediaType']);
$cUrl = strip_tags($_POST['addConclusionUpload']);
$cCapt = strip_tags($_POST['addConclusionCaption']);


$myArticleControl = new MyArticlesControl();
echo $myArticleControl->AddArticle($header,$coverImg,$articleCat,$desc,$pText,$pUrl,$pType,$pCapt,$sText,$sUrl,$sType,$sCapt,$cText,$cUrl,$cType,$cCapt);
