<?php
require_once 'config/config.php';
?>


<div class="container">
    <div class="container">
        <h1 class="text-center">Week 6 – Frameworks</h1>
    </div>
    <br>

    <h2>MVC Explained</h2>
    <p class="text-justify">
        There are several commonly used frameworks and patterns to choose form when developing such as MVC, Layered, or MVVM. The framework I have chosen to implement in my website is MVC.
    </p>

    <p class="text-justify">
        MVC splits your project into 3 functional parts. The Model, the View and the Controller. The code in the View is responsible for the display of the website. No business logic or Database connections are performed form this part.
    </p>
    <p>
        The Model is the part of the application where all the data connections and structures are stored. The Model queries the websites data source and should be built in such a way that it returns the data in a format that is easily read by the View and will not need changing if the websites data source changes. For my site I have set all returned data to be sent in Json format. Json stand for JavaScript Object Notation and is a wildly used and human readable way to send data between environments.
    </p>

    <p class="text-justify">
        The Controller is the part of the framework that powers the website. It receives inputs from the user and communicates these actions to the applications Model. these changes are then represented in the view.
    </p>
    <h2>Benefits of MVC </h2>
    <p class="text-justify">
        MVC is a well-known framework that many developers are familiar with. This means that if a new developer was to start working on our project they would have a much easier time understanding the architecture and would be able to continue developing the site using this framework much quicker than if they were having to learn a new/ unfamiliar framework.
    </p>
    <p class="text-justify">
        MVC also allows multiple developers to work on different parts of the application simultaneously without effecting each others development. It is possible for someone to develop the Controller while another developer makes changes to the view and another makes changes to the Model without interrupting the other developers work.
    </p>
    <p class="text-justify">
        Because MVC splits your project into 3 distinct parts it also helps to make your code more readable; If a developer wants to change a part of the website they are only presented with logic for that part. This means that developers can easily find and make the change they need without affecting other parts.
    </p>
    <p class="text-justify">
        MVC also helps developers follow the DRY principle: “Don’t Repeat Yourself”.  This principle is all about minimising the amount of duplicated code a developer has to wright and then maintain.  As code from the model or view can be accessed throughout the site by the controller.
    </p>
</div>