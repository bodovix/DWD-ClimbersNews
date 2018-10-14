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

echo "upload_max_filesize ".ini_get("upload_max_filesize")."<br>";
echo "post_maxSize ".ini_get("post_max_size")."<br>";
echo "memory_limmit ".ini_get("memory_limit")."<br>";
echo "max_input_limmit ".ini_get("max_input_time")."<br>";
echo "max_execution_time ".ini_get("max_execution_time")."<br>";

set_time_limit(0);
ini_set('upload_max_filesize', '50M');
ini_set('post_max_size', '300M');
ini_set('memory_limit', '400M');
ini_set('max_input_time', 4000); // Play with the values
ini_set('max_execution_time', 4000); // Play with the values
echo "<br><br><br>";
echo "upload_max_filesize ".ini_get("user_ini.filename")."<br>";
echo "upload_max_filesize ".ini_get("upload_max_filesize")."<br>";
echo "post_max_size ".ini_get("post_max_size")."<br>";
echo "memory_limmit ".ini_get("memory_limit")."<br>";
echo "max_input_limmit ".ini_get("max_input_time")."<br>";
echo "max_execution_time ".ini_get("max_execution_time")."<br>";



require_once '../../Model/Article.php';
require_once  '../../config/config.php';
require_once '../MyArticlesControl.php';

//Check all fields sent via post
//header
//print_r($_POST); echo '<br><br><br>';
//print_r($_FILES );
if (!isset($_POST['addArticleHeader'])){
    echo 1 ."</br>";return;
}
if (!isset($_FILES['addCoverImage'])){
    echo 2 ."</br>";return;
}
if (!isset($_POST['addArticleCategory'])){
    echo 3 ."</br>";return;
}
if (!isset($_POST['addArticleDescription'])){
    echo 4 ."</br>";return;
}
//primary
if (!isset($_POST['addPrimaryText'])){
    echo 5 ."</br>";return;
}
if (!isset($_POST['addPrimaryMediaType'])){
    echo 6  ."</br>";return;
}

if (isset($_POST['addPrimaryMediaType'])){
    if ($_POST['addPrimaryMediaType'] != 'none'){
        if (!isset($_FILES['addPrimaryUpload'])){
            echo 7 ."</br>";return;
        }
        if (!isset($_POST['addPrimaryCaption'])){
            echo 8 ."</br>";return;
        }
    }
}

//Secondary
if (!isset($_POST['addSecondaryText'])){
    echo 9 ."</br>";return;
}
if (!isset($_POST['addSecondaryMediaType'])){
    echo 10 ."</br>";return;
}
if (isset($_POST['addSecondaryMediaType'])){
    if ($_POST['addSecondaryMediaType'] != 'none'){
        if (!isset($_FILES['addSecondaryUpload'])){
            echo 11 ."</br>";return;
        }
        if (!isset($_POST['addSecondaryCaption'])){
            echo 12 ."</br>";return;
        }
    }
}

//Conclusion
if (!isset($_POST['addConclusionText'])){
    echo 13 ."</br>";return;
}
if (!isset($_POST['addConclusionMediaType'])){
    echo 14 ."</br>";return;
}
if (isset($_POST['addConclusionMediaType'])){
    if ($_POST['addConclusionMediaType'] != 'none'){
        if (!isset($_FILES['addConclusionUpload'])){
            echo 15 ."</br>";return;
        }
        if (!isset($_POST['addConclusionCaption'])){
            echo 16 ."</br>";return;
        }
    }
}


$header = strip_tags($_POST['addArticleHeader']);
$coverImg = $_FILES['addCoverImage'];
$articleCat = strip_tags($_POST['addArticleCategory']);
$desc = strip_tags($_POST['addArticleDescription']);

$pText = strip_tags($_POST['addPrimaryText']);
$pType = strip_tags($_POST['addPrimaryMediaType']);
$pUrl = null;
if (isset($_FILES['addPrimaryUpload'])){
    $pUrl = $_FILES['addPrimaryUpload'];
}
$pCapt = "";
if (isset($_POST['addPrimaryCaption'])){
    $pCapt = strip_tags($_POST['addPrimaryCaption']);
}

$sText = strip_tags($_POST['addSecondaryText']);
$sType = strip_tags($_POST['addSecondaryMediaType']);
$sUrl = null;
if (isset($_FILES['addSecondaryUpload'])){
    $sUrl = $_FILES['addSecondaryUpload'];
}
$sCapt = "";
if (isset($_POST['addSecondaryCaption'])){
    $sCapt = strip_tags($_POST['addSecondaryCaption']);
}

$cText = strip_tags($_POST['addConclusionText']);
$cType = strip_tags($_POST['addConclusionMediaType']);
$cUrl = null;
if (isset($_FILES['addConclusionUpload'])){
    $cUrl = $_FILES['addConclusionUpload'];
}
$cCapt = "";
if (isset($_POST['addConclusionCaption'])){
    $cCapt = strip_tags($_POST['addConclusionCaption']);
}



$myArticleControl = new MyArticlesControl();
echo $myArticleControl->AddArticle($header,$coverImg,$articleCat,$desc,$pText,$pUrl,$pType,$pCapt,$sText,$sUrl,$sType,$sCapt,$cText,$cUrl,$cType,$cCapt);
