$(function() {
    RefreshDataReadings();
    // setInterval(function() {
    //     if ($('#recentReadingsUL').is(':visible')){
    //         RefreshDataReadings()
    //     }
    // }, 1000);
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
                $('#recentReadingsUL').html("No Readings Found  ");
            } else{
                $('#recentReadingsUL').html(data);
            }
        },
        error: (error) => {
            console.log(JSON.stringify(error));
        }
    });
}