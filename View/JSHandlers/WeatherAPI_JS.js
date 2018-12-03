$(function() {
    $(document).on('click', '#searchBtn', function () {
        var searchBar = $('#searchInput');
        var errorMsgBox = $('#errorMessage');
        var searchBarVal = searchBar.val();
        var location = $('#locationTxt');

        var selectedLocation =$("#searchInput option:selected").text();
        var time = $('#timeTxt');
        var summary = $('#summaryTxt');
        var tempracture = $('#tempTxt');
        var link = $('#linkTxt');

        $.ajax({
            type: "GET",
            data: {},
            url: "https://dataservice.accuweather.com/currentconditions/v1/"+searchBarVal+"?apikey=UUTQ4AGUNDyPIBqv2fROxiopPy5aAGA9",
            //  dataType: "html",
            //  async: true,
            success: function (data) {
                if (data === null || data === "") {
                    //Error
                    showErrorMsg(errorMsgBox,"Failed To Connect To AccueWeather");
                } else {
                    hideMessageBox(errorMsgBox);
                    //Success
                    var result = data[0];

                    var timeResult = result["LocalObservationDateTime"];
                    var dateTime = new Date(timeResult);
                    var summaryResult = result["WeatherText"];
                    var tempResult = result["Temperature"]["Metric"];
                    location.text(selectedLocation);
                    time.text(dateTime.toLocaleTimeString());
                    summary.text(summaryResult);
                    tempracture.text("" + tempResult["Value"]+tempResult["Unit"]);
                    link.attr("href",result["Link"]);
                }
            },
            error: (error) => {
                console.log(JSON.stringify(error));
            }
        });
    });
});

function showErrorMsg(alertBox,errorMessage) {
    alertBox.removeClass('d-none');
    alertBox.removeClass('alert-success');
    alertBox.addClass('alert-danger');
    alertBox.html(errorMessage);
}

function hideMessageBox(alertMsgBox) {
    alertMsgBox.addClass('d-none');
    alertMsgBox.removeClass('alert-danger');
    alertMsgBox.html("");
}