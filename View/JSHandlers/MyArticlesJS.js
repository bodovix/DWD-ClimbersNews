$(function(){
//================EVENTS===============================
    var mainContainer =  $('#uploadArticleContainer');
    var addResultMessage;
    //AddArticle Btn Click
    $(document).on('click','#addArticleNavBtn',function () {
        mainContainer.load('Includes/articles/AddArticle.php',function () {
            togglePrimaryUploadHide();
            toggleSecondaryUploadHide();
            toggleConclusionUploadHide();
            addResultMessage = $('#addResultMessage');
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
            showErrorMsg(addResultMessage,formValidation.msg)
        }else{
            //Valid
            hideMessageBox(addResultMessage);

            //var formData = $('form#addArticleForm').serialize();
            var formData = new FormData($('#addArticleForm')[0]);
            $.ajax({
                type: "POST",
                data: formData,
                url: 'View/phpAjaxScripts/CallAddArticle.php',
                //  dataType: "html",
                //  async: true,
                cache: false,
                 processData: false,
                 contentType: false,
                success: function(data) {
                    if (data !== ""){
                        //Error
                        showErrorMsg(addResultMessage,data);
                        return;
                    } else{
                        showSuccessMessage(addResultMessage,"Add Article Successful")
                    }
                },
                error: (error) => {
                    console.log(JSON.stringify(error));
                }
            });


        }
    });
//==============GLOBAL VARIABLES==============================
    const headerLengthLimit = 60;
    const descriptionLengthLimit = 70;
    const textLengthLimit = 4000;
    const mediaTypeOptions = ['none','image','video','audio'];
    const mediaCaptionLengthLimit = 200;
    const maxImageSizeBytes = 3000000;
    const maxAudioSizeBytes = 10000000;
    const bytesToKb = 1000;


    const maxVideoSizeBytes = 40000000;

//=======================FUNCTIONS=======================
    function showErrorMsg(alertBox,errorMessage) {
        alertBox.removeClass('d-none');
        alertBox.removeClass('alert-success');
        alertBox.addClass('alert-danger');
        alertBox.html(errorMessage);
    }
    function showSuccessMessage(alertMsgBox,successMessage) {
        alertMsgBox.removeClass('d-none');
        alertMsgBox.addClass('alert-success');
        alertMsgBox.removeClass('alert-danger');
        alertMsgBox.text(successMessage);
    }
    function hideMessageBox(alertMsgBox) {
        alertMsgBox.addClass('d-none');
        alertMsgBox.removeClass('alert-danger');
        alertMsgBox.html("");
    }
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



        var headlineResult = validateHeadline(maxImageSizeBytes);
        if (headlineResult.error){
            return  { error: true, msg: headlineResult.msg };
        }
        var initialResult = validateSection(maxImageSizeBytes,maxAudioSizeBytes,maxVideoSizeBytes,$('#addPrimaryText'),$('#addPrimaryMediaType'),$('#addPrimaryUpload'),$('#addPrimaryCaption'),"Primary");
        if (initialResult.error){
            return  { error: true, msg: initialResult.msg };
        }
        var secondary = validateSection(maxImageSizeBytes,maxAudioSizeBytes,maxVideoSizeBytes,$('#addSecondaryText'),$('#addSecondaryMediaType'),$('#addSecondaryUpload'),$('#addSecondaryCaption'),"Secondary");
        if (secondary.error){
            return  { error: true, msg: secondary.msg };
        }
        var conclusionResult = validateSection(maxImageSizeBytes,maxAudioSizeBytes,maxVideoSizeBytes,$('#addConclusionText'),$('#addConclusionMediaType'),$('#addConclusionUpload'),$('#addConclusionCaption'),"Conclusion");
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
            msg = "Header: Headline Required";
        }
        if (file.val() === ""){
            isValid = false;
            msg = "Header: Cover Image Required";
            return !isValid ? { error: true, msg: msg } : { error: false, msg: msg } ;
        }
        if (category.val() === ""){
            isValid = false;
            msg = "Header: Category Required";
        }
        if (description.val() === ""){
            isValid = false;
            msg = "Header: Description Required";
        }
        //fields valid
        if (header.val().length > headerLengthLimit){
            isValid = false;
            msg = "Header: Headline Cannot be longer than "+headerLengthLimit+" characters";
        }
        var size = file.prop("files")[0].size;
        if (size > maxImageSizeBytes){
            isValid = false;
            var inkb = Math.ceil(size /bytesToKb );
            msg = "Header: cover Image to big("+ inkb +"KB). file cannot exceed "+(maxImageSizeBytes /bytesToKb)+"KB";
        }

        if (description.val().length > descriptionLengthLimit){
            isValid = false;
            msg = "Header: Description cannot be more than "+descriptionLengthLimit+" characters long";
        }

        return !isValid ? { error: true, msg: msg } : { error: false, msg: msg } ;
    }

    function validateSection(maxImageSizeBytes, maxAudioSizeBytes, maxVideoSizeBytes, sectionText, sectionMediaType, sectionFile, sectionMediaCaption,sectionName) {
        var isValid = true;
        var msg = "";

        //fields Required if Type set
        //if none
        if (sectionMediaType.val() ==="none"){
            //don't need to validate as wont get saved
        }
        //if image
        if (sectionMediaType.val() ==="image"){
            //Required Fields
            if (sectionFile.val() === ""){
                isValid = false;
                msg = sectionName+": If media type is not 'None' a file must be selected";
                return !isValid ? { error: true, msg: msg } : { error: false, msg: msg } ;
            }
            //file size
            var size = sectionFile.prop("files")[0].size;
            if (size > maxImageSizeBytes){
                isValid = false;
                var inkb = Math.ceil(size /bytesToKb );

                msg = sectionName+": File to big("+ inkb +" Kb). file cannot exceed "+(maxImageSizeBytes/bytesToKb )+" Kb";
            }

        }
        //if audio
        if(sectionMediaType.val() ==="audio"){
            //Required Fields
            if (sectionFile.val() === ""){
                isValid = false;
                msg = sectionName+": If media type is not 'None' a file must be selected";
                return !isValid ? { error: true, msg: msg } : { error: false, msg: msg } ;
            }
            var audioSize = sectionFile.prop("files")[0].size;
            if (audioSize > maxAudioSizeBytes){
                isValid = false;
                var inkb2 = Math.ceil(size /bytesToKb );
                msg = sectionName+": File to big("+ inkb2 +" Kb). file cannot exceed "+(maxAudioSizeBytes / bytesToKb)+" Kb";
            }
        }
        //if video
        if(sectionMediaType.val() ==="video"){
            //Required Fields
            if (sectionFile.val() === ""){
                isValid = false;
                msg = sectionName+": If media type is not 'None' a file must be selected";
                return !isValid ? { error: true, msg: msg } : { error: false, msg: msg } ;
            }
            var videoSize = sectionFile.prop("files")[0].size;
            if (videoSize > maxVideoSizeBytes){
                isValid = false;
                var inkb3 = Math.ceil(size /bytesToKb );

                msg = sectionName+": File to big("+ inkb3 +" Kb). file cannot exceed "+(maxVideoSizeBytes /bytesToKb)+" Bytes";
            }
        }

        //Size limits per type
        if (sectionText.val().length > textLengthLimit){
            isValid = false;
            msg = sectionName+": Text Too long ( "+sectionText.length+" ). cannot exceed "+textLengthLimit+" characters.";
        }
        if (sectionMediaCaption.val().length > mediaCaptionLengthLimit){
            isValid = false;
            msg = sectionName+": Caption cannot exceed "+mediaCaptionLengthLimit+" characters";
        }

        return !isValid ? { error: true, msg: msg } : { error: false, msg: msg } ;
    }


});
