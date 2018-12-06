<?php
require_once 'config/config.php';
?>


<div class="container">
    <div class="container">
        <h1 class="text-center">Week 7 – IOT Read Data</h1>
    </div>
    <br>

    <h2>Intro to The Electric Imp</h2>
    <p class="text-justify">
        The electric imp is a small device used to transmit sensor readings from a local location to a server on the Internet. From here the devices readings can be used to power other web connected devices data driven functionality. For example, a weather station taking temperature readings and sending them online.
    </p>
    <p>
        The electric imp device has no means of direct user input such as a keyboard or mouse. Instead the user sets up the imp via a mobile application that can be downloaded from the App/Play Store. The App utilizes a “Blink-up” process to connect the imp to a network and Agent.
    </p>

    <p class="text-justify">
        The “Agent” is the terminology used for the remote server that hosts the Electric imp’s services online. It is where the imp’s data is first sent to and where the imps data is processed processed before being sent on to the end users Website or Mobile Application to be displayed to the user.
    </p>
    <h2>Reading Sensors</h2>
    <p class="text-justify">
        The Electric Imp has been setup with physical sensors that allow it to read the rooms Imps External Temperature, the Internal Temperature and voltage of the device as well as the current light level of the room.
    </p>
    <p class="text-justify">
        Code has been developed through the Electric Imps agent and then published to the device. This code tells the Imp to read the current External Temperature, Internal Temporiser voltage and current light level several times a minute. once a reading is received the Imp has been programed to post this data up to the Agent. These readings are then out putted to the Agents Log window.
    </p>
    <br/>
    <br/>
    <br/>
</div>