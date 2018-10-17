<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



require_once '../../Controller/MyArticlesControl.php';

$myArtCtr = new MyArticlesControl();
?>
<div class="container">
    <div class="form">
        <div>
            <div class="mx-auto text-center">Add Article</div>
            <form class="form" method="post" name="addArticleForm" id="addArticleForm" enctype="multipart/form-data">
                <nav class="navbar navbar-expand-sm  navbar-dark">
                    <div class="container">
                        <div class=" navbar-collapse" id="navbarMyArticle">
                            <ul class="navbar-nav mx-auto">
                                <li class="page-item">
                                    <div id="toggleAddHeaderBtn" class="page-link">Header Info</div>
                                </li>
                                <li class="page-item">
                                    <div id="toggleAddInitialBtn" class="page-link">Primary Section</div>
                                </li>
                                <li class="page-item">
                                    <div  id="toggleAddSecondBtn"  class="page-link">Secondary Section</div>
                                </li>
                                <li class="page-item">
                                    <div  id="toggleAddConclusionBtn" class="page-link">Conclusion</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div id="addResultMessage" class="alert d-none">
                    dsfg
                </div>
                <!--:::::::::::::::::::::::::::Article HEADER INFO::::::::::::::::::::::::::-->
                <div id="AddFormHeaderSection">
                    <div class="text-center">Header</div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addArticleHeader">Headline</label>
                            <input name="addArticleHeader" id="addArticleHeader" class="form-control" type="text"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addCoverImage">cove Image</label>
                            <input name="addCoverImage" id="addCoverImage" class="form-control" type="file" accept="image/x-png,image/jpeg"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addArticleCategory">Category</label>
                            <?php echo $myArtCtr->DisplayArticleCategoriesAsOptionSet("addArticleCategory"); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addArticleDescription">Description</label>
                            <input name="addArticleDescription" id="addArticleDescription" class="form-control" type="text"/>
                        </div>
                    </div>
                </div>
                <!--:::::::::::::::::::::::::::Article Initial INFO::::::::::::::::::::::::::-->
                <div id="addArticleInitialSection"  style="display : none">
                    <div class="text-center">Primary</div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addPrimaryText">Initial Text</label>
                            <input name="addPrimaryText" id="addPrimaryText" class="form-control" type="text"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addPrimaryMediaType">Initial Media Type</label>
                            <select name="addPrimaryMediaType" id="addPrimaryMediaType" class="form-control mediaTypeInput">
                                <option value="none">None</option>
                                <option value="image">Image</option>
                                <option value="video">Video</option>
                                <option value="audio">Audio</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addPrimaryUpload">Initial Media Upload</label>
                            <input name="addPrimaryUpload" id="addPrimaryUpload" class="form-control" type="file"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addPrimaryCaption">Caption</label>
                            <input name="addPrimaryCaption" id="addPrimaryCaption" class="form-control" type="text"/>
                        </div>
                    </div>
                </div>

                <!--:::::::::::::::::::::::::::Article SECONDARY INFO::::::::::::::::::::::::::-->
                <div id="addArticleSecondSection" style="display : none">
                    <div class="text-center">Secondary</div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addSecondaryText">Secondary Text</label>
                            <input name="addSecondaryText" id="addSecondaryText" class="form-control" type="text"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addSecondaryMediaType">Secondary Media Type</label>
                            <select name="addSecondaryMediaType" id="addSecondaryMediaType" class="form-control mediaTypeInput">
                                <option value="none">None</option>
                                <option value="image">Image</option>
                                <option value="video">Video</option>
                                <option value="audio">Audio</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addSecondaryUpload">Secondary Media Upload</label>
                            <input name="addSecondaryUpload" id="addSecondaryUpload" class="form-control" type="file" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addSecondaryCaption">Caption</label>
                            <input name="addSecondaryCaption" id="addSecondaryCaption" class="form-control" type="text"/>
                        </div>
                    </div>
                </div>

                <!--:::::::::::::::::::::::::::Article CONCLUSION INFO::::::::::::::::::::::::::-->
                <div id="addArticleConclusionSection" style="display : none">
                    <div class="text-center">Conclusion</div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addConclusionText">Conclusion Text</label>
                            <input name="addConclusionText" id="addConclusionText" class="form-control" type="text"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addConclusionMediaType">Conclusion Media Type</label>
                            <select name="addConclusionMediaType" id="addConclusionMediaType" class="form-control mediaTypeInput" >
                                <option value="none">None</option>
                                <option value="image">Image</option>
                                <option value="video">Video</option>
                                <option value="audio">Audio</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addConclusionUpload">Conclusion Media Upload</label>
                            <input name="addConclusionUpload" id="addConclusionUpload" class="form-control" type="file" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="addConclusionCaption">Caption</label>
                            <input name="addConclusionCaption" id="addConclusionCaption" class="form-control" type="text"/>
                        </div>
                    </div>
                </div>
                <div id="AddArticleBtn"  class="btn btn-success">Save</div>
            </form>
        </div>
    </div>
</div>