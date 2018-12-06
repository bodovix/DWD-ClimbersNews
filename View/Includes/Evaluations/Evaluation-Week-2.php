<div class="container">
    <div class="container">
        <h1 class="text-center">Week 2</h1>
    </div>

    <h2>Database System</h2>
    <img class="mx-auto d-block" src="uploads/Evaluations/Week-2/uml.JPG">
    <br>
    <p class="text-justify">
        The websites database is split into 6 tables; a User table that will store basic details about users and their roles within the site. An article table that will be used to store all the details the website needs to sort and render articles for the users. An ‘ArticleCategories’ table that will be used to store the general groups that articles can be ‘categorized’ into for better searching/ finding related topics. Only users with the appropriate roles will be able to Create new articles. The user will have the ability to give feedback through comments and place ratings on articles. This information has been stored inside the Rating and Feedback tables.
    </p>

    <h2>Normalisation</h2>
    <p class="text-justify">
        The database meets 3rd normal form as there are no transitive dependencies; Ratings and feedback have been pulled into their own tables. This helps keep the system in 3rd form as users may wish to only rate or only leave feedback. Having them in one table could cause many blank cells in the would be ‘combined feedback’ table, An indicator of poor normalization.
        Article Categories were pulled into their own table. This was to keep the categories safe from update & delete anomalies. If categories were kept in Articles and admin deleted all Articles of Category X. that category would also be deleted form system storing them in their own table means Categories are safe from accidental deletion/update and can be controlled by site admin.
    <br>
        Article bodies have been split into 3 categories Primary, Secondary and Conclusion. These will be rendered in that order and allow authors to create dynamic articles with a range of layout and media types whilst making the system easily maintainable.
    </p>

    <h2>Article Summary Design </h2>
    <p class="text-justify">
        Bootstraps built in Card classes were used to display summary lists of articles and their content as tile icons. Cards give the user a clear and easily clickable means of summarizing articles and providing informative links to them that help the user decide what article to read.
        Pagination and search functionality has been setup to allow the user to filter down the loaded articles and to display them in user friendly groups of 6 at a time. Without pagination or search the user could be presented with 1000s of articles at once making the site hard to navigate and hurting the user experience.
    </p>
</div>
</html>
