//Document Ready

$(function() {
$(document).on('click','.articlePager',function () {
        var selectedPageItem = $(this).parent();
    $.ajax({
        type: "POST",
        data: {
            class:'IndexControl',
            function:'DisplayPageChangeArticles',
            param:this.value
        },
        url: "global/ClassCaller.php",
      //  dataType: "html",
      //  async: true,
        success: function(data) {
            $('#recentArticleContainer').html(data);
           // selectedPageItem.addClass('active').siblings().removeClass('active');
        },
        error: (error) => {
            console.log(JSON.stringify(error));
        }
    });
})
});