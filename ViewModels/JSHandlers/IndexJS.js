//Document Ready

$(function() {
$('.articlePager').on('click',function () {
        var selectedPageItem = $(this).parent();
    $.ajax({
        type: "POST",
        data: {
            class:'IndexControl',
            function:'DisplayArticlesAsCards',
            param:this.value
        },
        url: "global/ClassCaller.php",
      //  dataType: "html",
      //  async: true,
        success: function(data) {
            $('#recentArticleContainer').html(data);
            selectedPageItem.addClass('active').siblings().removeClass('active');
        },
        error: (error) => {
            console.log(JSON.stringify(error));
        }
    });
})
});