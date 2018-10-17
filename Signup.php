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
include_once 'View/Includes/Header.php';


?>

    <script src="../View/JSHandlers/SignupJS.js"></script>
<div id="signupFormsContainer" class="container">
    <?php
        include_once "View/Includes/Login.php";
    ?>
</div>

<?php
$pathToPage = URLROOT.'Evaluation.php?week=4';
include_once 'View/Includes/Footer.php';?>