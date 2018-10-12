$(function(){
    var mainContainer =  $('#uploadArticleContainer');
   //AddArticle Btn Click
    $(document).on('click','#addArticleNavBtn',function () {
        mainContainer.load('Includes/articles/AddArticle.php');
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
});