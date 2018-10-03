<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    JQuery 3.3.1  to power custom JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--    <script src="--><?php //echo URLROOT; ?><!--Resources/js/JQuery3_3_1.js"></script>-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
          crossorigin="anonymous">

    <scripr src="../View/JSHandlers/SignupJS.js"></scripr>

<div>
    <div id="banner" class="col-12 bg-dark" style="height: 100px">
        <p class="align-middle text-danger h1" id="title">Climbers News</p>
    </div>
</div>
<nav class="navbar navbar-expand-sm  navbar-dark bg-primary ">
    <div class="container">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav1">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav1">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo 'Index.php'; ?>">Recent Articles</a>
                </li>
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Evaluations</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo 'Evaluation.php?week=1'?>">Week 1</a>
                        <a class="dropdown-item" href="<?php echo 'Evaluation.php?week=2'?>">Week 2</a>
                        <a class="dropdown-item" href="<?php echo 'Evaluation.php?week=3'?>">Week 3</a>
                    </div>
                </li>
                <?php
                    if (!isset($_SESSION['userId'])){
                        $link = <<<EOT
                        <li id="signInLink" class="nav-item">
                            <a class="nav-link" href="Signup.php">Sign in</a>
                        </li>
EOT;
                    }else{
                        $link = <<<EOT
                        <li id="LogoutLink" class="nav-item">
                            <p class="nav-link mb-0" >Logout</p>
                        </li>
EOT;
                    }
                    echo $link;
                ?>


            </ul>
        </div>
    </div>
</nav>
</header>