<div class="container">
    <div class="container">
        <h1 class="text-center mb-3 mt-3">Week 3 - The API</h1>
    </div>

    <div class="container">
        <div class="thumbnail mb-3">
            <img class="mx-auto  d-block mb-0" src="uploads/Evaluations/Week-3/before.jpg" width="1005">
            <div class="caption">
                <p class="text-center font-italic">Original Code with data and display logic in the same place</p>
            </div>
        </div>
    </div>
    <h2>API Implementation</h2>

    <p class="text-justify">
        The above code sample is an example of a website that does not implement a good API for its data layer.
        <br>
        This code is hard to read and maintain since its display and data logic are tightly coupled throughout the website. The solution to this problem is to implement an effective API to keep the logical parts of your website separate and make the database logic more reusable throughout the site.
        <br>
        <br>
        To Implement the improved application structure and API I split the websites  logic into two parts; Data and Display. All the websites data logic such as sql Scripts and connections was moved into a separate Folder and Class: eg ‘Model/Article.php’. The websites display code has all been moved into the View part of the api in files only relating to Display logic e.g. ‘View/Includes/Footer.php’:
    </p>
    <img class="mx-auto d-block mb-3" src="uploads/Evaluations/Week-3/newFileStructure.jpg">
     <p>
         The New Article Class was setup to only return Article data in JSON format (JavaScript Object Notation) this way the websites Display code is kept decoupled from the Article classes implementation. The View would receive the data in JSON format, deserialize it then do whatever it needed with the data
     </p>
    <div class="thumbnail mb-3">
        <img class="mx-auto d-block mb-0"  src="uploads/Evaluations/Week-3/newArticleModelAPI.jpg" alt="Image not found." >
        <div class="caption">
            <p class="text-center font-italic">The new Article API Class</p>
        </div>
    </div>
    <div class="thumbnail ">
        <img class="mx-auto d-block mb-0" src="uploads/Evaluations/Week-3/View.jpg" alt="Image not found." >
        <div class="caption">
            <p class="text-center font-italic">Display Code encapsulates Article Data layer </p>
        </div>
    </div>

    <h2>Benefits of using an API</h2>
    <p class="text-justify">
        Using an API structure in your website is a good idea and there are many benefits of using one in your websites. It makes your code much more readable and will make future development and changes easier as it helps keeps your websites code loosely coupled and makes it more coherent as functionality is split into logical parts.
    </p>
    <p class="text-justify">
        An API model like this also helps keep the logical parts of your website separate. By separating the display and data logic it is easy for multiple developers to potentially work on the website at the same time. Someone can build the front end whilst another works on the backend. Because both developers are working on an agreed API integrating their work once complete will be much easier.
    </p>
    <p class="text-justify">
        Another benefit of using this API is that it keeps your display and data logic loosely coupled. The Data logic sends all its data to the display in JSON format, The Display code knows nothing about the implementation of the Data logic and vice versa. The data logic could be updated to use TSQL, a remote webservice or any other method of retrieving data without the display code needing to be changed. This helps make the website much more modular and maintainable.
    </p>
<br>
<br>
</div>
</html>
