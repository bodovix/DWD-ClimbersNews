<div class="container">
    <div class="form">
        <div>
            <div class="mx-auto text-center">Add Article</div>
            <form class="form" method="post" name="addArticleForm">
                <nav class="navbar navbar-expand-sm  navbar-dark bg-primary ">
                    <div class="container">
                        <div class=" navbar-collapse" id="navbarMyArticle">
                            <ul class="navbar-nav mx-auto">
                                <li class="page-item">
                                    <div id="toggleAddHeaderBtn" class="page-link" value="{$index}">Header Info</div>
                                </li>
                                <li class="page-item">
                                    <div id="toggleAddInitialBtn" class="page-link" value="{$index}">Primary Section</div>
                                </li>
                                <li class="page-item">
                                    <div  id="toggleAddSecondBtn"  class="page-link" value="{$index}">Secondary Section</div>
                                </li>
                                <li class="page-item">
                                    <div  id="toggleAddConclusionBtn" class="page-link" value="{$index}">Conclusion</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!--:::::::::::::::::::::::::::Article HEADER INFO::::::::::::::::::::::::::-->
                <div id="AddFormHeaderSection">
                    <div class="text-center">Header</div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addArticleHeader">Headline</label>
                            <input id="addArticleHeader" class="form-control" type="text"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addArticleHeader">cover</label>
                            <input id="addArticleHeader" class="form-control" type="text"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addArticleHeader">Category</label>
                            <input id="addArticleHeader" class="form-control" type="text"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addArticleHeader">Description</label>
                            <input id="addArticleHeader" class="form-control" type="text"/>
                        </div>
                    </div>
                </div>
                <!--:::::::::::::::::::::::::::Article PRIMARY INFO::::::::::::::::::::::::::-->
                <div id="addArticleInitialSection"  style="display : none">
                    <div class="text-center">Primary</div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addArticleHeader">Initial Text</label>
                            <input id="addArticleHeader" class="form-control" type="text"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addArticleHeader">Initial Media Type</label>
                            <input id="addArticleHeader" class="form-control" type="text"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addArticleHeader">Initial Media Upload</label>
                            <input id="addArticleHeader" class="form-control" type="text"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addArticleHeader">Caption</label>
                            <input id="addArticleHeader" class="form-control" type="text"/>
                        </div>
                    </div>
                </div>

                <!--:::::::::::::::::::::::::::Article SECONDARY INFO::::::::::::::::::::::::::-->
                <div id="addArticleSecondSection" style="display : none">
                    <div class="text-center">Secondary</div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addArticleHeader">Secondary Text</label>
                            <input id="addArticleHeader" class="form-control" type="text"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addArticleHeader">Secondary Media Type</label>
                            <input id="addArticleHeader" class="form-control" type="text"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addArticleHeader">Secondary Media Upload</label>
                            <input id="addArticleHeader" class="form-control" type="text"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addArticleHeader">Caption</label>
                            <input id="addArticleHeader" class="form-control" type="text"/>
                        </div>
                    </div>
                </div>

                <!--:::::::::::::::::::::::::::Article CONCLUSION INFO::::::::::::::::::::::::::-->
                <div id="addArticleConclusionSection" style="display : none">
                    <div class="text-center">Conclusion</div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addArticleHeader">Conclusion Text</label>
                            <input id="addArticleHeader" class="form-control" type="text"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addArticleHeader">Conclusion Media Type</label>
                            <input id="addArticleHeader" class="form-control" type="text"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addArticleHeader">Conclusion Media Upload</label>
                            <input id="addArticleHeader" class="form-control" type="text"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addArticleHeader">Caption</label>
                            <input id="addArticleHeader" class="form-control" type="text"/>
                        </div>
                    </div>
                </div>
                <input type="button" value="Save" class="btn btn-success"/>
            </form>
        </div>
    </div>
</div>