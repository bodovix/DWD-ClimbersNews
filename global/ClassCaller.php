<?php
require_once  '../global/ConnectionSingleton.php';
require_once '../Controller/IndexControl.php';
require_once '../Model/Article.php';
require_once  '../config/config.php';

$function = $_POST['function'];
$className = $_POST['class'];

//Initialize Objects
switch ($className){
    case 'IndexControl':
        $class = new IndexControl();
        break;
}

//Execute requested method
if (isset($_POST['param3'])){
    $result = $class->{$function}($_POST['param'],$_POST['param2'],$_POST['param3']);
    echo $result;
    return;
}
if (isset($_POST['param2'])){
    $result = $class->{$function}($_POST['param'],$_POST['param2']);
    echo $result;
    return;
}
if(isset($_POST['param'])){
    $result = $class->{$function}($_POST['param']);
    echo $result;
}
?>

