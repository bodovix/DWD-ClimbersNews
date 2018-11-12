$(function() {
    RefreshDataReadings();
});
function RefreshDataReadings() {
    $.ajax({
        type: "POST",
        //data: null,
        url: 'Controller/phpAjaxScripts/CallElectricImpGetRecent.php',
        //  dataType: "html",
        //  async: true,
        cache: false,
        processData: false,
        contentType: false,
        success: function(data) {
            if (data === "" || data === null){

                //Error
                $('#recentReadingsUL').append("No Readings Found  ");

                return;
            } else{
                $('#recentReadingsUL').append(data);
            }
        },
        error: (error) => {
            console.log(JSON.stringify(error));
        }
    });
}