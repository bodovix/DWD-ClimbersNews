<?php
include_once 'ViewModels/SearchBarControl.php'
?>
<nav class="navbar navbar-expand-sm  navbar-dark bg-info ">
    <div class="container">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#searchBar">
            <span class="">Search</span>
        </button>
        <div class="collapse navbar-collapse" id="searchBar">
            <ul class="navbar-nav m-auto">
                <p class="navbar-brand d-none d-sm-inline-block">Created On:</p>
                <li class="nav-item">
                    <form class="form-inline ml-auto">
<!--                        <input id="titleSearch" class="form-control mr-2 mt-2" type="text" placeholder="Article Name">-->
<!--                        <input id="categorySearch" class="form-control mr-2 mt-2" type="text" placeholder="Category">-->
                        <input id="createdOnSearch" class="form-control mr-2 mt-2" type="date" value="2018-10-1" placeholder="Created On">
                        <input id="searchBtn" class="btn btn-success" type="button" value="go">

                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
