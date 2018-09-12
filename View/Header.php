<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
          crossorigin="anonymous">
</head>
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
                    <a class="nav-link" href="#">Recent Articles</a>
                </li>
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Evaluations</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Week 1</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>