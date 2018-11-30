<html>
<head>
</head>
<body>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once  'config/config.php';
include_once 'View/Includes/Header.php';

$xml = simplexml_load_file('https://www.ukclimbing.com/articles/rss.php') ;

echo "<br>";
echo "<br>";

$xsl = simplexml_load_file("View/XSL/UkcXSL.xsl") ;

$proc = new XSLTProcessor() ;
$proc->importStyleSheet($xsl);
$result = $proc->transformtoXML($xml) ;
echo $result;


?>

</body>
<?php
$pathToPage = URLROOT.'Evaluation.php?week=11';
include 'View/Includes/Footer.php';
?>
</html>
