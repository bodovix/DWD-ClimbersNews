<html>
<head>
</head>
<body>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$xml = simplexml_load_file('https://www.ukclimbing.com/articles/rss.php') ;
//var_dump($xml) ;
//$result = $xml -> xpath("/item/title") ;
//$result = $xml -> xpath("/catalog/cd[6]/title") ;
//$result = $xml -> xpath("/catalog/cd[price>10]/title") ;
//$result = $xml -> xpath("/catalog/cd[country='UK']/artist") ;

/////$result = $xml -> xpath("channel/item/title") ;
//$result = $xml -> xpath("/catalog/cd[6]/title") ;
//$result = $xml -> xpath("/catalog/cd[price>10]/title") ;
//$result = $xml -> xpath("/catalog/cd[country='UK']/artist") ;
//var_dump($result) ;
echo "<br>";
echo "<br>";

$xsl = simplexml_load_file("View/XSL/UkcXSL.xsl") ;

$proc = new XSLTProcessor() ;
$proc->importStyleSheet($xsl);
$result = $proc->transformtoXML($xml) ;
echo $result;

//for($i=0; $i < sizeof($xml->channel->item); $i++) {
//$current = $xml ->channel-> item[$i] ;
//
//echo $current->title;
//echo '<br/>' ;
//echo "Category " ;
//
//}
?>

</body>
</html>
