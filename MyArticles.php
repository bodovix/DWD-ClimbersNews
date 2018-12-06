<html>
<?php
session_start();
include_once 'Controller/AuthorCheck.php';

require_once  'global/ConnectionSingleton.php';
require_once  'config/config.php';

include_once 'View/Includes/Header.php';
include_once 'View/Includes/MyArticlesNav.php';

?>

<script src="View/JSHandlers/MyArticlesJS.js"></script>

<body >
<div class="row">
    <div class="container">
        <div id="uploadArticleContainer">

        </div>
    </div>
</div>
</body>

<?php
$pathToPage = URLROOT.'Evaluation.php?week=5';
include 'View/Includes/Footer.php';
?>
</html>

