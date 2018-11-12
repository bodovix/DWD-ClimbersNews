$(function() {

    var external = $('#externalTemp');
    var internal = $('#internalTemp');
    var voltage = $('#voltage');
    var lightLevel = $('#lightLevel');
    //External

    if(external.attr('data-reading') < 26.5){
        //low
        external.parent().addClass('alert-danger');
    }else{
        //normal
        external.parent().addClass('alert-success');

    }
    //Internal
    if(internal.attr('data-reading') < 26.5){
        //low
        internal.parent().addClass('alert-danger');
    }else{
        //normal
        internal.parent().addClass('alert-success');

    }
    //Voltage
    if(voltage.attr('data-reading') < 3.2){
        //low
        voltage.parent().addClass('alert-danger');
    }else{
        //normal
        voltage.parent().addClass('alert-success');

    }
    //Light Level
    if(lightLevel.attr('data-reading') < 50000){
        //low
        lightLevel.parent().addClass('alert-danger');
    }else{
        //normal
        lightLevel.parent().addClass('alert-success');

    }
});