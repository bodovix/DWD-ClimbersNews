<html>
<head>
</head>
<body>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


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
</html>
