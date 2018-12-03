$(function() {
    $(document).on('click', '#searchBtn', function () {
        var searchBar = $('#searchInput');
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
                    alert("no Data Returned TODO")
                } else {
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
