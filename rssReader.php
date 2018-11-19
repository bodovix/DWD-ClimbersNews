<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo 'List of Articles.<br/>' ;
$xml = simplexml_load_file('Resources/rss/CNRss.txt');

for($i=0; $i < sizeof($xml->channel->item); $i++) {
    $current = $xml ->channel-> item[$i] ;

    echo $current->headline;
    echo '<br/>' ;
    echo "Category " ;
    echo  $current->category;
    echo '<br/>' ;
    echo "Description " ;
    echo  $current->description;
    echo '<br/>' ;
    echo "Created On " ;
    echo  $current->createdOn;
    echo '<br/>' ;
    echo "Author " ;
    echo  $current->author;
    echo '<br/>' ;
    echo '<br/>' ;
    echo '<br/>' ;
}

////============
//echo "<br>";
//echo "<br>";
//echo "<br>";
//echo 'List of Books.<br/>' ;
//$xml = simplexml_load_file('Resources/rss/rssexample.txt');
//echo sizeof($xml->item);
//for($i=0; $i < sizeof($xml->item); $i++) {
//    $current = $xml -> item[$i] ;
//    echo $current -> title ;
//    echo " link " ;
//    echo  $current -> link ;
//    echo '<br/>' ;
//}

