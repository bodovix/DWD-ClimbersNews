<?php
require_once 'config/config.php';
?>


<div class="container">
    <div class="container">
        <h1 class="text-center">Week 4 – Register and Login</h1>
    </div>
    <br>

    <h2>Stripped tags to prevent SSX attacks</h2>
    <p class="text-justify">
        The Websites login and Registration functionality was made as secure as possible by stripping all code Tags from the user’s inputs. This helps protect the website from Cross Site Scripting (XSS) attacks. A XSS attack is when someone injects harmful code into your website, usually thorough the websites forms and users’ inputs.
        <br>
        With user inputs stripped of tags if the user was to attempt to enter some harmful Script into one of the inputs it wouldn’t run as code when sent back to the display potently harming other users experience or stealing data.
    </p>
    <h2>Secure Salted Hash for passwords</h2>


    <p class="text-justify">
        The website also helps protect its users personal data by providing them with a secure Registration and login that implements Hashed passwords; When the user logs in the entered password is hashed and compared with the hash stored in the Database.
        <br>
        <br>
        On the website passwords are not sent across the network or stored on the database as plain text. If an attacker was to intercept the Registration or login packets on the network, they would not be able to use the information. Likewise, if they were to gain access to the database Server they would not be able to interpret the users stored passwords as they have been stored in an encrypted format with a secure random Salt added. Salting ensures that passwords are not easily guessed by the attacker since they add random characters to passwords.
    </p>
    <h2>Client-Side and Server-side Validation</h2>
    <p class="text-justify">
        A combination of Client side and server-side validation has been used to validate the user’s registration inputs before storing in the database. This validation helps ensure that the required information is populated before being sent to the Database and ensures that data is sent in a format that the database can store.
        <br>
        <br>
        Client-side validation provides the user with a fast and user-friendly response to their form inputs. However, it is easy for a malicious user to exploit or circumnavigate this validation. Server-side validation has also been implemented to back up the Client side. This validation is not as dynamic since it must travel across the network but will acts as final safety check on the user’s inputs as it cannot be easily circumnavigated by an attacker.
    </p>
    <h2>Session Variables</h2>
    <p class="text-justify">
        Once logged in the users State is stored using PHPs SESSION variables and not Cookies. Cookies would store the state information on the client’s computer and have a higher risk of being tampered with whereas sessions are stored securely on the server and are disposed of automatically after a period of inactivity by the user.
    </p>

</div>