<?php
require_once 'config/config.php';
?>


<div class="container">
    <div class="container">
        <h1 class="text-center">Week 11 XSLT</h1>
</div>
    <br>

    <h2>UKC External RSS Feed </h2>
    <p class="text-justify">
        The Website now implements one of the UKC Websites RSS Feeds. The UKCs recent article feed has been taken and processed by the CN website. UKC are another well-established Climbing News Website. They regularly update their websites content with new news, reviews and articles relating to the climbing community.
    </p>
    <p  class="text-justify">
        Adding content from UKCs most recent articles too the CN website will help provide CNs visitors with new dynamically loaded content on top of that already provided by Climbers News. This will help keep the site feeling dynamic as new content will be presented to its visitors frequently as they will now see changes made by the CN Authors as well as the UKC Authors.
    </p>

    <h2>XSLT</h2>
    <p class="text-justify">
        XSLT (Extensible Stylesheet Transformations) is a XML biased language used to transom XML data into other document types such as HTML.  XSLT combined with XPath queries can be used to filter a collection of XML Data and to render it into an HMTL Page.
    </p>
    <p class="text-justify">
        XPath is part of the XSLT standard. XPath is used to navigate through the branches and nodes in a n XML document. XPath is used in XSLT to search and filter XML documents prior to them being rendered out to the users display. querying XML documents using XPath is a very clean and fast way of filtering large quantities of XML data so that only the necessary data is outputted to the Display.
    </p>
    <p class="text-justify">
        XSLT offers several benefits to the developer over the common way of processing data via a separate scripting language such as PHP:
    </p>
    <p class="text-justify">
        XSLT provides developers with an easy and convenient means of converting XML Data into HTML that can be rendered on websites: The XSLT that filters and formats the XML data is written in a dedicated .xsl file. This means that the websites designers only need to visit one place to alter the display of the XML Data and do not have to also go through large amounts of other code that would make changes more complicated and prone to error.
    </p>
    <p class="text-justify">
        The code required to filter and display an XML data set into a html page with XSLT is relatively shorthand and can be done with very little clutter or messy code compared to the same results achieved with PHP or another separate Scripting language.  This is because navigating the DOM to process XML data in another scripting language is a more complex process whereas XSLT allows you to filter and template the data in a clear format with minimal scripting language overhead or DOM Manipulation.
    </p>
    <br/>
    <br/>
    <br/>
</div>