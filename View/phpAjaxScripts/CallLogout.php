<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 03/10/2018
 * Time: 10:31
 */
session_start();
session_destroy();
header("Location: Index.php");