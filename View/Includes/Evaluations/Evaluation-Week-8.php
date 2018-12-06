<?php
require_once 'config/config.php';
?>


<div class="container">
    <div class="container">
        <h1 class="text-center">Week 8 – IOT 2 – Storing Readings</h1>
    </div>
    <br>

    <h2>Sending Data </h2>
    <p class="text-justify">
        The electric Imp has been setup to send its recorded data readings to the Agent server a couple times a minute. The Agent has been programmed to format the Data into Json strings. The JSON is sent across the Internet using POST communication as it encrypts its contents before sending it over the network. The Data is sent to the Climbers News website where a PHP script retrieves the data.
    </p>
    <p>
        The Website takes the Json String and sends it on to the websites database where it is stored in a dedicated table along with the Current Date and Time.
    </p>
    <h2>Storing in Json Format</h2>
    <p class="text-justify">
        The Electric Imps data is stored in the Central Database in Json Format. Storing data in Json format results in a database table with only 3 columns. The ID of the Record. The Date and Time of Creation. And a large String Column that contains all the Electric Imps Data in JSon format. Storing all the data in one column like this has several benefits and trade-offs.
    </p>
    <p class="text-justify">
        The main downside to storing data in this format is means the databases data is not properly normalized as a large portion of its data is blindly stored in large string column. The data is also less human readable when stored as JSon strings inside a Relational Database as a large amount of data is encapsulated inside one database column.
    </p>
    <p class="text-justify">
        The main benefit of storing data within your database in Json format is that it offers massively enhanced flexibility. The database design doesn’t need to change as its data does. The Json Column in the database can hold as much or as little data types as required. Data can be stored in any hierarchy required with and as much complexity as is needed whilst only being represented by a single column in a relational database. The data stored in the Json Strings can also be changed and expanded upon as required without changes being made to the Relational database.
    </p>
    <p class="text-justify">
        This becomes especially useful when you are uncertain of the types of data you are going to be storing, or when you wish to store as much data as possible under the assumption that it may be useful in the future as it prevents you from having massive tables with many columns that may or may not be used in the future.
    </p>
    <h2>Reading Data</h2>
    <p class="text-justify">
        Websites can be setup to read Json Data being stored in a relational database in much the same way as they would normal data. The only additional logic needed is that once retrieved from the database the data being stored as Json must first be deserialized by the chosen language so that it can be outputted to the user in the desired format.
    </p>
    <br/>
    <br/>
    <br/>
</div>