<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 03/10/2018
 * Time: 10:31
 */
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_destroy();
header( "refresh:0;url=../../Index.php" );