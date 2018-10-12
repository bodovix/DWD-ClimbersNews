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

            setFilterType($('#addPrimaryMediaType'),$('#addPrimaryUpload'));
            setFilterType($('#addSecondaryMediaType'),$('#addSecondaryUpload'));
            setFilterType($('#addConclusionMediaType'),$('#addConclusionUpload'));
    });

    $(mainContainer).on('click','#AddArticleBtn',function () {
       var formValidation =  validateAddArticleForm()
        if(formValidation.error){
            //Error
            alert(formValidation.msg);
        }else{
            //Valid
            alert($('#addCoverImage').val());
        }
    });
});

//=======================FUNCTIONS=======================
function setFilterType(mediaType,controlToFilter) {
    if (mediaType.val() === 'none'){
        controlToFilter.attr("accept","");
    }
    if (mediaType.val() === 'image'){
        controlToFilter.attr("accept","image/x-png,image/jpeg");
    }
    if(mediaType.val() === 'video'){
        controlToFilter.attr("accept","video/mp4");
    }
    if(mediaType.val() === 'audio'){
        controlToFilter.attr("accept","audio/mp3,audio/wav");
    }
}

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
    var secondary = secondaryConclusion();
    if (secondary.error){
        return  { error: true, msg: secondary.msg };
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


    //All fields required
    if (header.val() === "" ){
        isValid = false;
        msg = "Headline Required";
    }
    if (file.val() === ""){
        isValid = false;
        msg = "Cover Image Required";
    }
    if (category.val() === ""){
        isValid = false;
        msg = "Category Required";
    }
    if (description.val() === ""){
        isValid = false;
        msg = "Description Required";
    }
    //fields valid
    if (header.length > 60){
        isValid = false;
        msg = "Headline Cannot be longer than 60 characters";
    }
    if (file.length > 175){
        isValid = false;
        msg = "File name cannot be more than 175 characters";
    }
    if (description.length > 70){
        isValid = false;
        msg = "Description cannot be more than 70 characters long";
    }

    return !isValid ? { error: true, msg: msg } : { error: false, msg: msg } ;
}
function validateInitial() {
    var isValid = true;
    var msg = "";
    var text = $('#addPrimaryText');
    var mediaType = $('#addPrimaryMediaType');
    var mediaUpload = $('#addPrimaryUpload');
    var mediaCaption = $('#addPrimaryCaption');

    return !isValid ? { error: true, msg: msg } : { error: false, msg: msg } ;
}
function secondaryConclusion() {
    var isValid = true;
    var msg = "";
    var text = $('#addSecondaryText');
    var mediaType = $('#addSecondaryMediaType');
    var mediaUpload = $('#addSecondaryUpload');
    var mediaCaption = $('#addSecondaryCaption');


    return !isValid ? { error: true, msg: msg } : { error: false, msg: msg } ;
}
function validateConclusion() {
    var isValid = true;
    var msg = "";
    var text = $('#addConclusionText');
    var mediaType = $('#addConclusionMediaType');
    var mediaUpload = $('#addConclusionUpload');
    var mediaCaption = $('#addConclusionCaption');


    return !isValid ? { error: true, msg: msg } : { error: false, msg: msg } ;
}
