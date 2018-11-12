$(function() {
    alert("test");
    RefreshDataReadings();
});
function RefreshDataReadings() {
    $.ajax({
        type: "GET",
        //data: null,
        url: 'Controller/phpAjaxScripts/CallElectricImpGetRecent.php',
        //  dataType: "html",
        //  async: true,
        cache: false,
        processData: false,
        contentType: false,
        success: function(data) {
            if (data == ""){
                alert(data);

                //Error
                $('#recentReadingsUL').append("No Readings Found");

                return;
            } else{
                alert(data);
                $('#recentReadingsUL').append(data);
            }
        },
        error: (error) => {
            console.log(JSON.stringify(error));
        }
    });
}