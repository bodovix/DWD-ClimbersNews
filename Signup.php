<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 10/1/2018
 * Time: 11:55 AM
 */
?>
<?php
require_once 'global/ConnectionSingleton.php';
require_once 'config/config.php';
include_once 'Includes/Header.php';


?>

    <script src="View/JSHandlers/SignupJS.js"></script>
<div id="signupFormsContainer" class="container">
    <?php  include_once  "Includes/Login.php" ?>
</div>

<?php
//TODO:sort out evaluation for week 4
$pathToPage = URLROOT.'Evaluation.php?week=4';
include_once 'Includes/Footer.php';?>