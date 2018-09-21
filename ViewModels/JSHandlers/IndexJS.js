//Document Ready

$(function() {
    //non filtered pager
    $(document).on('click','.articlePager',function () {
            var selectedPageItem = $(this).parent();
        $.ajax({
            type: "POST",
            data: {
                class:'IndexControl',
                function:'DisplayPageChangeArticlesAll',
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
    });

    //FILTERED PAGER
    $(document).on('click','.articlePagerFiltered',function () {
        var dateCreatedFilter = $('#createdOnSearch').val();
        $.ajax({
            type: "POST",
            data: {
                class:'IndexControl',
                function:'DisplayPageChangeArticlesFiltered',
                param:this.value,
                param2:dateCreatedFilter
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
    });

    //Search by Date Created
    $(document).on('click','#searchBtn',function () {
        var createdOnInput = $(this).siblings('#createdOnSearch');

        $.ajax({
            type: "POST",
            data: {
                class:'IndexControl',
                function:'DisplayPageChangeArticlesFiltered',
                param:1,
                param2:createdOnInput.val()

            },
            url: "global/ClassCaller.php",
            //  dataType: "html",
            //  async: true,
            success: function(data) {

                if (data !== null || data !== '' || data === false){
                    alert(data);
                    $('#recentArticleContainer').html(data);
                // selectedPageItem.addClass('active').siblings().removeClass('active');
                }else{
                    alert("No articles found");
                }
            },
            error: (error) => {
                console.log(JSON.stringify(error));
            }
        });
    });
});
