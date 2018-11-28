<?php
require_once 'config/config.php';
?>


<div class="container">
    <div class="container">
        <h1 class="text-center">Week 9 – JQuery Mobile & Displaying Data -IOT 3</h1>
    </div>
    <br>

    <h2>JQuery Mobile</h2>
    <p class="text-justify">
        JQuery mobile is an open source framework designed to help developers build responsive “Mobile First” websites. Mobile first development is when a website is designed with the developer targeting the site for mobile devices before Desktop PCs. Mobile first is the opposite of the traditional style of web development where developers build the website for PC monitor sized displays then re-engineer the display to fit mobile screens.
    </p>
    <p>
        As well as being mobile first JQuery mobile also provides its own CSS styling and built in support for Ajax Calls. This built in functionality alongside JQuery make it very easy for developers to quickly setup sites with dynamic content without the need for complex JavaScript code.
    </p>
    <h2>Storing in Json Format</h2>
    <p class="text-justify">
        JQuery mobile is also cross platform meaning its end users will be able to effectively view and use the app without issue regardless of the OS their mobile devices are running be it UWP, Android or IOS.
    </p>

    <h2>Climbers News Implementation</h2>
    <p class="text-justify">
        The Climbers news web site uses the JQuery mobile framework to display the data retrieved from the Electric Imp device. The frameworks built in functionality to display the data in the form of a drop-down for each date and time taken.
    </p>
    <p class="text-justify">
        To prevent the reader being overwhelmed with un-necessary data only the 10 most recent readings are retrieved from the database. Each reading is evaluated and given a colour code to represent weather or not it is a low value before being displayed on the page. Green represents a high value and red represents an unusually low value.
    </p>
    <br/>
    <br/>
    <br/>
</div>