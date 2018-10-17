<?php
require_once 'config/config.php';
?>


<div class="container">
    <div class="container">
        <h1 class="text-center">Week 5 – Article Security</h1>
    </div>
    <br>
    <p>
        This week I added the websites article upload functionality. Because this feature allows users to upload files to the Fileserver as well as records to the database it was important that this new feature be secure:
    </p>
    <h2>User Roles</h2>
    <p class="text-justify">
        I needed to set the site up so that only trusted users could upload articles. I created 3 user roles in the website: ‘Admin’, ‘Author’ and ‘user’ and only gave Admin And author users the ability to upload articles. Average users who registers won’t be able to upload files to the server.
    </p>
    <h2>File Server Settings</h2>
    <p class="text-justify">
        I increased the security of the article upload functionality the server was to only open wright access to the file servers ‘upload’ folder. This way if an attacker was to somehow abuse the upload functionality they would only be able to access the more open Uploads folder. The websites other scripts and controls would be kept read-only.
    </p>
    <h2>Input Validation</h2>
    <p>
        I added validation to the user’s inputs to make sure they were within the correct size and types to be saved in the database. This will help to ensure that new articles don’t get truncated or fail to save correctly.
        <br>
        To protect the site from Cross Site Scripting Attacks (XXS) I set the upload so that it strips all the user’s inputs of code tags. Doing so prevents the user from being able to upload JavaScript or other code onto the website.
        <br>
        To protect the site form SQL Injection, I used prepared statements these help the server by first telling it the format of query you’re going to send it. This way if a malicious user tries to trick the form by ‘Injecting’ a different more harmful query to the server it won’t execute.
    </p>
    <h2>File Upload Validation</h2>
    <p class="text-justify">
        To help increase the security of the article upload I had to setup security for file uploads. I would not be secure to allow the users to upload any type of file to the sever. I set up the file uploader to check to ensure the file was one of the following types (.Jpeg, .png, .mp3, .wav, or .mp4)  if the users attempts to upload a file that is not valid the upload is cancelled.
    </p>
    <p class="text-justify">
        To help protect the site from DOS Attacks (Denial of Service) I limited the size of the files that the user can upload. This stops them uploading massive files to the server. Causing us to run out of server space and slowing/freezing the webserver down for other users.
    </p>
</div>