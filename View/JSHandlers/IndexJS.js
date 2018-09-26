//Document Ready

$(function() {
    //Clear Search
    $(document).on('click','#clearSearchBtn',function () {
        $.ajax({
            type: "POST",
            data: {
                class:'IndexControl',
                function:'DisplayPageChangeArticlesAll',
                param:1
            },
            url: "global/ClassCaller.php",
            //  dataType: "html",
            //  async: true,
            success: function(data) {
                $('#recentArticleContainer').html(data);
                $('#createdOnSearch').val('');
                if ($('#noResultsFoundWarning').is(":visible")){
                    $('#noResultsFoundWarning').hide();
                }
                // selectedPageItem.addClass('active').siblings().removeClass('active');
            },
            error: (error) => {
                console.log(JSON.stringify(error));
            }
        });
    });

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
        var pageValue = this.value;

        $.ajax({
            type: "POST",
            data: {
                class:'IndexControl',
                function:'DisplayPageChangeArticlesFiltered',
                param:pageValue,
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
            if(!Date.parse(createdOnInput.val())){
                return;

            }
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
                if (data === 0 || data === '0' ){
                    //No Results
                    $('#noResultsFoundWarning').show();
                    $('#recentArticleContainer').html('');

                }else{
                    //Found Data
                    $('#noResultsFoundWarning').hide();
                    $('#recentArticleContainer').html(data);
                }
            },
            error: (error) => {
                console.log(JSON.stringify(error));
            }
        });
    });
});
