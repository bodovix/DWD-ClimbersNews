<?php
include_once 'Controller/SearchBarControl.php';
$searchBar = new SearchBarControl();
?>
<nav class="navbar navbar-expand-sm  navbar-dark bg-info ">
    <div class="container">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#searchBar">
            <span class="">Search</span>
        </button>
        <div class="collapse navbar-collapse" id="searchBar">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <form class="form-inline ml-auto">
<!--                        <input id="titleSearch" class="form-control mr-2 mt-2" type="text" placeholder="Article Name">-->
<!--                        <input id="categorySearch" class="form-control mr-2 mt-2" type="text" placeholder="Category">-->
                        <input id="createdOnSearch" class="form-control mr-2" type="text"  onblur="(this.type = 'text')" onfocus="(this.type = 'date')" placeholder="Created On">
                        <input id="searchBtn" class="btn btn-success mr-2 d-inline-block my-auto" type="button" value="go">
                        <input id="clearSearchBtn" class="btn btn-success mr-2 d-inline-block my-auto"  type="button" value="Clear">

                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="row" id="noResultsFoundWarning" style="display: none;">
    <div class="col">
        <div class="col bg-warning text-center">No Articles Found</div>
    </div>
</div>

