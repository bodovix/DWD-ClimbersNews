<?php
require_once 'config/config.php';
?>


<div class="container">
    <div class="container">
        <h1 class="text-center">Week 3</h1>
    </div>

    <div class="container">
        <div class="thumbnail mb-3">
            <img class="mx-auto  d-block mb-0" src="uploads/Evaluations/Week-3/before.jpg" width="1005">
            <div class="caption">
                <p class="text-center font-italic">Original Code with data and display logic in the same place</p>
            </div>
        </div>
    </div>
    <h2>How API was Implemented</h2>

    <p class="text-justify">
        The websites Articles functionality had been implemented and tested. however, all the code for getting articles from the Database and rendering them on screen had been place in the same files such as the read article code seen above.
    </p>
    <p class="text-justify">
        This was making the code harder to read and maintain since its display and data logic are tightly coupled throughout the website. It was wise to implement a solution to this problem before any further development was carried out, making the problem larger harder to refactor. An API needed to be put in place to separate the websites logical parts and make the database logic more reusable throughout the site.
        <br>
        <br>
        To Implement the improved API I split the websites article logic into two parts, Data and Display. The Article date logic was moved into a separate Folder and Class: ‘Model/Article.php’ which left my Display Code in files only relating to Display code e.g. ‘View/pageNameControl.php’:
    </p>
    <img class="mx-auto d-block mb-3" src="uploads/Evaluations/Week-3/newFileStructure.jpg">
     <p>
         The New Article Class was setup to only return Article data in JSON format (JavaScript Object Notation) this way my Display code was totally decoupled from the Article classes implementation. The display would receive the data in JSON format, deserialize it then do whatever it needed with the data
     </p>
    <div class="thumbnail mb-3">
        <img class="mx-auto d-block mb-0"  src="uploads/Evaluations/Week-3/newArticleModelAPI.jpg" alt="Image not found." >
        <div class="caption">
            <p class="text-center">The new Article API</p>
        </div>
    </div>
    <div class="thumbnail ">
        <img class="mx-auto d-block mb-0" src="uploads/Evaluations/Week-3/View.jpg" alt="Image not found." >
        <div class="caption">
            <p class="text-center">Display Code encapsulates Article Data layer </p>
        </div>
    </div>

    <h2>Benefits of using an API</h2>
    <p class="text-justify">
        There are many benefits of using a structured API such as this in your websites. It makes your code much more readable and will make additional development easier.
    </p>
    <p class="text-justify">
        An API model like this also helps keep the logical parts of your website separate. By separating the display and data logic we make it easy for multiple developers to potentially work on the website at the same time. Someone can build the front end whilst another works on the backend. Because both developers are working on an agreed API integrating their work once complete will be much easier.
    </p>
    <p class="text-justify">
        Another benefit of using this API is that it keeps your display and data logic loosely coupled. The Data logic sends all its data to the display in JSON format, The Display code knows nothing about the implementation of the Data logic. The data logic could be updated to use TSQL, a remote webservice or any other method of retrieving data without the display code needing to be changed. This helps make the website more modular and maintainable.
    </p>

</div>
</html>