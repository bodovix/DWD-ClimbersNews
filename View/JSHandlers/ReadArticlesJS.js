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
            showErrorMsg(allertBox,validateResult.msg);
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
                        //success
                        $('#articleDisplayContainer').prepend(data);
                    } else{
                        //error
                        showErrorMsg(allertBox,"Failed to save comment. please try again or contact support");
                        return;
                    }
                },
                error: (error) => {
                    console.log(JSON.stringify(error));
                }
            });
        }
    });
    //Remove Comment
    $(document).on('click','.removeCommentBtn',function () {
        var commentBtn = $(this);
        var commentId = commentBtn.siblings('.commentId').val();
        var commentSection = commentBtn.parent();
        var alertBox = $('#addCommentAlert');
        hideMessageBox(alertBox);

        $.ajax({
            type: "POST",
            data: {commentId: commentId },
            url: 'Controller/phpAjaxScripts/CallRemoveComment.php',
            //  dataType: "html",
            //  async: true,
            success: function(data) {
                if (data === ""){
                    //success
                    commentSection.fadeOut().remove();
                } else{
                    //error
                    showErrorMsg(alertBox,data);
                    return;
                }
            },
            error: (error) => {
                console.log(JSON.stringify(error));
            }
        });
    });
    //Star Rating System
    //hover
    var ratingSystemBtns = $('#articleRatingSystem');
    ratingSystemBtns.children().mouseover(function () {
        $(this).css({"color":"gold"});
        $(this).prevAll().css({"color":"gold"});
        $(this).nextAll().css({"color":"black"});
    });
    ratingSystemBtns.children().mouseleave(function(){
        $(this).css({"color":""});
        $(this).prevAll().css({"color":""});
        $(this).nextAll().css({"color":""});
    });
    //click
    $(document).on('click','.starRatingIcon',function () {
        var ratingIcon = $(this);
        var score = ratingIcon.attr("data-value");
        var alertBox = $('#addCommentAlert');
        hideMessageBox(alertBox);

        //save rating
        //$rating,$articleId,$userId)

        $.ajax({
            type: "POST",
            data: {
                rating: score,
                articleId:$('#articleID').val()
            },
            url: 'Controller/phpAjaxScripts/CallSetRatingOnArticle.php',
            //  dataType: "html",
            //  async: true,
            success: function(data) {
                if (isNaN(data)){
                    //error
                    showErrorMsg(alertBox,data);
                    return;
                } else{
                    //success
                    updateRatingDisplay(score);
                }
            },
            error: (error) => {
                console.log(JSON.stringify(error));
            }
        });
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
    function updateRatingDisplay(averageScore) {
        var five = $('#fiveStarRating');
        var four = $('#fourStarRating');
        var three = $('#threeStarRating');
        var two = $('#twoStarRating');
        var one = $('#oneStarRating');

        if (averageScore >= 4.5){
            five.addClass('rated');
            four.addClass('rated');
            three.addClass('rated');
            two.addClass('rated');
            one.addClass('rated');
        }
        else if (averageScore >= 3.5){
            four.addClass('rated');
            three.addClass('rated');
            two.addClass('rated');
            one.addClass('rated');
        }
        else if(averageScore >=2.5){
            three.addClass('rated');
            two.addClass('rated');
            one.addClass('rated');
        }
        else if (averageScore >=1.5){
            two.addClass('rated');
            one.addClass('rated');
        }else if(averageScore >=0.5){
            one.addClass('rated');
        }
    }
});
