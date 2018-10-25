<div class="container">
    <div class="container">
        <h1 class="text-center">Week 5 – Article Security</h1>
    </div>
    <br>
    <h2>User Roles</h2>
    <p class="text-justify">
        To ensure that only trusted users can upload Articles on the website its users are setup to fit int o 3 user roles: ‘Admin’, ‘Author’ and ‘user’. Only Admin And authors have the ability to upload articles. Average users who registers won’t be able to upload files to the server.
    </p>
    <h2>File Server Settings</h2>
    <p class="text-justify">
        Since the ability to upload articles also comes with the ability to upload Media files for them The Websites file server is kept secure. It is setup so that only the servers upload folder has wright permissions set. This way if an attacker was to somehow abuse the upload functionality they would only be able to access the more open Uploads folder. The websites other scripts and controls would be kept read-only.
    </p>
    <h2>Input Validation</h2>
    <p>
        The Websites users' inputs are validated to make sure they were within the correct size and types to be saved in the database. This will help to ensure that new articles don’t get truncated or fail to save correctly.
        <br>
        The Websites upload form is setup so that it strips all the user’s inputs of code tags on submit. Doing so prevents the user from being able to run a XXS (Cross Site Scripting) attacks on the site.
        <br>
        The site is protected against SQL Injection; It uses prepared statements, these help the server by first telling it the format of query you’re going to send it. This way if a malicious user tries to trick the form by ‘Injecting’ a different more harmful query to the server it won’t execute.
    </p>
    <h2>File Upload Validation</h2>
    <p class="text-justify">
        The websites file upload functionality is also made secure;  The file uploader uses PHPs mime_content_type() method to determine the files type. Once determined the website checks to ensure the file is one of the following valid and safe types (.Jpeg, .png, .mp3, .wav, or .mp4)  if the users attempts to upload a file that is not valid the upload is cancelled and rolled back.
    </p>
    <p class="text-justify">
        The website attempts to protect it'self form DOS (Denial of Service) attacks; The size of the files that the user can upload is limited to 2MB. This size limit helps by stopping attackers uploading massive files to the server. Causing us to run out of server space and slowing/freezing the site for other users.
    </p>
</div>