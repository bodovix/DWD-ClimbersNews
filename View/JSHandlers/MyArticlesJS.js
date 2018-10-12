$(function(){
//================EVENTS===============================
    var mainContainer =  $('#uploadArticleContainer');
   //AddArticle Btn Click
    $(document).on('click','#addArticleNavBtn',function () {
        mainContainer.load('Includes/articles/AddArticle.php',function () {
            togglePrimaryUploadHide();
            toggleSecondaryUploadHide();
            toggleConclusionUploadHide();
        });
    });

    $(mainContainer).on('click','#toggleAddHeaderBtn',function () {
        $('#AddFormHeaderSection').show();

        $('#addArticleInitialSection').hide();
        $('#addArticleSecondSection').hide();
        $('#addArticleConclusionSection').hide();
    });
    $(mainContainer).on('click','#toggleAddInitialBtn',function () {
        $('#addArticleInitialSection').show();

        $('#AddFormHeaderSection').hide();
        $('#addArticleSecondSection').hide();
        $('#addArticleConclusionSection').hide();
    });
    $(mainContainer).on('click','#toggleAddSecondBtn',function () {
        $('#addArticleSecondSection').show();

        $('#AddFormHeaderSection').hide();
        $('#addArticleInitialSection').hide();
        $('#addArticleConclusionSection').hide();
    });
    $(mainContainer).on('click','#toggleAddConclusionBtn',function () {
        $('#addArticleConclusionSection').show();

        $('#AddFormHeaderSection').hide();
        $('#addArticleInitialSection').hide();
        $('#addArticleSecondSection').hide();
    });
    $(mainContainer).on('change','#addPrimaryMediaType, #addSecondaryMediaType ,#addConclusionMediaType',function () { //
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

function validateAddArticleForm() {
    var headlineResult = validateHeadline();
    if (headlineResult.error){
        return  { error: true, msg: headlineResult.msg };
    }
    var initialResult = validateInitial();
    if (initialResult.error){
        return  { error: true, msg: initialResult.msg };
    }
    var conclusionResult = validateConclusion();
    if (conclusionResult.error){
        return  { error: true, msg: conclusionResult.msg };
    }
    return  { error: false, msg: "" };
}

function validateHeadline() {
    var isValid = true;
    var msg = "";
    var header = $('#addArticleHeader');
    var file = $('#addCoverImage');
    var category = $('#addArticleCategory');
    var description = $('#addArticleDescription');

    return !isValid ? { error: true, msg: msg } : { error: false, msg: msg } ;
}
function validateInitial() {


    return !isValid ? { error: true, msg: msg } : { error: false, msg: msg } ;
}
function validateConclusion() {

    return !isValid ? { error: true, msg: msg } : { error: false, msg: msg } ;
}