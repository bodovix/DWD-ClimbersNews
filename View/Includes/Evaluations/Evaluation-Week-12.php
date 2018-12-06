<?php
require_once 'config/config.php';
?>


<div class="container">
    <div class="container">
        <h1 class="text-center">Week 12 REST API</h1>
    </div>
    <br>

    <h2>AccuWeather REST API</h2>
    <p class="text-justify">
        AccuWeather are an Online Weather Forecast provider. AccuWeather also offer a REST API Service for their weather data. REST stands for Representational State Transfer and is a means of making changes to and requests for data via http requests and responses.  In the case of AccuWeather they offer a REST API for their Weather Data to allow other websites and apps to read their data and implement it in their websites and applications.
    </p>
    <p  class="text-justify">
        AccuWeather offer a wide range of APIs to allow developers a choice of the type of data they want to receive.
    </p>
    <p class="text-justify">
        The Climbing News Website has implemented the ‘Current Conditions’ REST API provided. This will allow the CN website to display the current weather forecast at any location covered by the AccuWeather Forecast. The API is told what City it the website requests the current conditions for by including the City Code into the APIs Endpoint:
    </p>
    <div class="thumbnail ">
        <img class="mx-auto d-block mb-0" src="uploads/Evaluations/Week-12/RESTEndpoint.png" alt="Image not found." >
        <div class="caption">
            <p class="text-center font-italic">Current Conditions Endpoint with City and API Key</p>
        </div>
    </div>
    <h2>Implementation</h2>
    <p class="text-justify">
        To make use of An AccuWeather REST API you must first register an account and generate an API key. Without this key you cannot access any of their REST Services.
    </p>
    <p class="text-justify">
        A simple page with a dropdown to allow the user to select the city they want to receive the current forecast for has been setup. JQuerys Ajax functionality has been implemented to allow the user to dynamically switch between the Current Conditions forecasts for the cities within the dropdown.
    </p>
    <p class="text-justify">
        The user is presented with the following Details once a location has been picked:
    </p>
    <div class="thumbnail ">
        <img class="mx-auto d-block mb-0" src="uploads/Evaluations/Week-12/RESTResults.png" alt="Image not found." >
        <div class="caption">
            <p class="text-center font-italic">Results For London</p>
        </div>
    </div>
    <h2>Security</h2>
    <p class="text-justify">
        To keep the Climbers News Weather API Implementation and Key secure both the API url and key have been stored in the websites server-side code. It is important that this information be stored server side and not client side.
    </p>
    <p class="text-justify">
        If the API key were to be stored client side it would be easy for other people with a little technical knowledge to find it. If found the key could be copied into another person’s website or application and they could make use of our AccuWeather Account. This would be a problem for the climbing News as excessive use of their key could result in AccuWeather charging them for the usage. Or AccuWeather could limit the usage of the key resulting in a loss of service for the Climbing News Websites Visitors.
    </p>
    <br/>
    <br/>
    <br/>
</div>