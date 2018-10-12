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
       var formValidation =  validateAddArticleForm();
        if(formValidation.error){
            //Error
            alert(formValidation.msg);
        }else{
            //Valid

        }
    });
//==============GLOBAL VARIABLES==============================
    var headerLengthLimit = 60;
    var coverImageLimit = 150;
    var descriptionLengthLimit = 70;
    var textLengthLimit = 4000;
    var mediaTypeOptions = ['none','image','video','audio'];
    var mediaCaptionLimmit = 200;


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
        var maxImageSizeBytes = 3000000;
        var maxAudioSizeBytes = 0;
        var maxVideoSizeBytes = 0;


        var headlineResult = validateHeadline(maxImageSizeBytes);
        if (headlineResult.error){
            return  { error: true, msg: headlineResult.msg };
        }
        var initialResult = validateSection(maxImageSizeBytes,maxAudioSizeBytes,maxVideoSizeBytes,$('#addPrimaryText'),$('#addPrimaryMediaType'),$('#addPrimaryUpload'),$('#addPrimaryCaption'));
        if (initialResult.error){
            return  { error: true, msg: initialResult.msg };
        }
        var secondary = validateSection(maxImageSizeBytes,maxAudioSizeBytes,maxVideoSizeBytes,$('#addSecondaryText'),$('#addSecondaryMediaType'),$('#addSecondaryUpload'),$('#addSecondaryCaption'));
        if (secondary.error){
            return  { error: true, msg: secondary.msg };
        }
        var conclusionResult = validateSection(maxImageSizeBytes,maxAudioSizeBytes,maxVideoSizeBytes,$('#addConclusionText'),$('#addConclusionMediaType'),$('#addConclusionUpload'),$('#addConclusionCaption'));
        if (conclusionResult.error){
            return  { error: true, msg: conclusionResult.msg };
        }
        return  { error: false, msg: "" };
    }

    function validateHeadline(maxImageSizeBytes) {
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
        if (header.val().length > headerLengthLimit){
            isValid = false;
            msg = "Headline Cannot be longer than "+headerLengthLimit+" characters";
        }
        var size = file.prop("files")[0].size;
        if (size > maxImageSizeBytes){
            isValid = false;
            var inkb = Math.ceil(size /1000 );
            msg = "File to big("+ inkb +"KB). file cannot exceed 3000KB";
        }

        if (description.val().length > 70){
            isValid = false;
            msg = "Description cannot be more than 70 characters long";
        }

        return !isValid ? { error: true, msg: msg } : { error: false, msg: msg } ;
    }
    function validateSection(maxImageSizeBytes, maxAudioSizeBytes, maxVideoSizeBytes, sectionText, sectionMediaType, sectionFile, sectionMediaCaption) {
        var isValid = true;
        var msg = "";

        //fields Required if Type set

        //Size limits per type
        if (sectionText.val().length > 4000){
            isValid = false;
            msg = "Text Too long ( "+sectionText.length+" ). cannot exceed 4000 characters.";
        }
        if (sectionMediaCaption.val().length > 200){
            isValid = false;
            msg = "Caption cannot exceed 200 characters";
        }

        return !isValid ? { error: true, msg: msg } : { error: false, msg: msg } ;
    }


});
