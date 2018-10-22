$(function() {
    //=====================EVENTS===================
    //Add Comment
    $(document).on('click','#addCommentBtn',function () {
        var allertBox = $('#addCommentAlert');
        hideMessageBox(allertBox);
        var addBtn = $('#addCommentBtn');
        if (addBtn.is(":disabled")){
            return;
        }

        var validateResult = validateAddComment();
        if (validateResult.error){
            showErrorMsg(allertBox,validateResult.msg)
            return;
        }else{
            var commentText = $('#articleID').val();
            //Valid; Add Comment
            $.ajax({
                type: "POST",
                data: {feedback: $('#feedbackTxt').val(), article:commentText },
                url: 'Controller/phpAjaxScripts/CallAddComment.php',
                //  dataType: "html",
                //  async: true,
                success: function(data) {
                    if (data !== ""){
                        //Error
                        showErrorMsg(allertBox,data);
                        return;
                    } else{
                        //Valid

                    }
                },
                error: (error) => {
                    console.log(JSON.stringify(error));
                }
            });
        }


    });
    //================GLOBAL VARIABLES============
    var feedbackSizeLimit = 150;
    //=================METHODS====================
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

    function validateAddComment() {
        var txtBox = $('#feedbackTxt');
        var isValid = true;
        var msg = "";

        //has text
        if (txtBox.val() === ""){
            isValid = false;
            msg = "Comment Required.";
        }
        //not too much
        if (txtBox.val().length > feedbackSizeLimit){
            isValid = false;
            msg = "Comment cannot exceed " + feedbackSizeLimit;

        }
        return !isValid ? { error: true, msg: msg } : { error: false, msg: msg } ;
    }
});