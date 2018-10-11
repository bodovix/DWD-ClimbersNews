$(function(){
    var mainContainer =  $('#uploadArticleContainer');
   //AddArticle Btn Click
    $(document).on('click','#addArticleNavBtn',function () {
        mainContainer.load('Includes/articles/AddArticle.php');
    })
});