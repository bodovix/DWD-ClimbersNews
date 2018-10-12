$(function(){
    var mainContainer =  $('#uploadArticleContainer');
   //AddArticle Btn Click
    $(document).on('click','#addArticleNavBtn',function () {
        mainContainer.load('Includes/articles/AddArticle.php',function () {
            togglePrimaryUploadHide();
            toggleSecondaryUploadHide();
            toggleConclusionUploadHide();
        });
    });

    $(document).on('click','#toggleAddHeaderBtn',function () {
        $('#AddFormHeaderSection').show();

        $('#addArticleInitialSection').hide();
        $('#addArticleSecondSection').hide();
        $('#addArticleConclusionSection').hide();
    });
    $(document).on('click','#toggleAddInitialBtn',function () {
        $('#addArticleInitialSection').show();

        $('#AddFormHeaderSection').hide();
        $('#addArticleSecondSection').hide();
        $('#addArticleConclusionSection').hide();
    });
    $(document).on('click','#toggleAddSecondBtn',function () {
        $('#addArticleSecondSection').show();

        $('#AddFormHeaderSection').hide();
        $('#addArticleInitialSection').hide();
        $('#addArticleConclusionSection').hide();
    });
    $(document).on('click','#toggleAddConclusionBtn',function () {
        $('#addArticleConclusionSection').show();

        $('#AddFormHeaderSection').hide();
        $('#addArticleInitialSection').hide();
        $('#addArticleSecondSection').hide();
    });
    $('#uploadArticleContainer').on('change','#addPrimaryMediaType, #addSecondaryMediaType ,#addConclusionMediaType',function () { //
            togglePrimaryUploadHide();
            toggleSecondaryUploadHide();
            toggleConclusionUploadHide();
    });
});

//=======================FUNCTIONS=======================

function togglePrimaryUploadHide() {
    if ($('#addPrimaryMediaType').val() === 'none'){
        $('#addPrimaryUpload').attr('disabled', 'true');
        $('#addPrimaryCaption').attr('disabled', 'true');
    }else{
        $('#addPrimaryUpload').removeAttr('disabled');
        $('#addPrimaryCaption').removeAttr('disabled');
    }
}
function toggleSecondaryUploadHide() {
    if ($('#addSecondaryMediaType').val() === 'none'){
        $('#addSecondaryUpload').attr('disabled', 'true');
        $('#addSecondaryCaption').attr('disabled', 'true');
    }else{
        $('#addSecondaryUpload').removeAttr("disabled");
        $('#addSecondaryCaption').removeAttr("disabled");
    }
}
function toggleConclusionUploadHide() {
    if ($('#addConclusionMediaType').val() === 'none'){
        $('#addConclusionUpload').attr('disabled', 'true');
        $('#addConclusionCaption').attr('disabled', 'true');
    }else{
        $('#addConclusionUpload').removeAttr("disabled");
        $('#addConclusionCaption').removeAttr("disabled");
    }
}