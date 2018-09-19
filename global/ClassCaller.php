<?php
require_once  '../global/ConnectionSingleton.php';
require_once '../ViewModels/IndexControl.php';
require_once  '../config/config.php';

$function = $_POST['function'];
$className = $_POST['class'];
$param;

switch ($className){
    case 'IndexControl':
        $class = new IndexControl();
        $param = $_POST['param'];
        $result = $class->{$function}($param);
        echo $result;
        return;
        break;
}
?>