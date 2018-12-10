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
    if (!isset($_SESSION['userId'])){
        include_once "View/Includes/Login.php";
    }else{
        $alreadyLoggedIn = <<<REGEXP
        
        <div id="registerForm" class="container border-danger ">
            <div class="col-md-4 mx-auto my-4">
                <div class="alert alert-success" align="center">
                    <p>Logged In</a>
                </div>
            </div>
        </div>
REGEXP;
echo  $alreadyLoggedIn;
    }
    ?>
</div>
<br>
<br>
<br>
<div class="fixed-bottom">
    <?php
    $pathToPage = URLROOT.'Evaluation.php?week=4';
    include_once 'View/Includes/Footer.php';
    ?>
</div>
