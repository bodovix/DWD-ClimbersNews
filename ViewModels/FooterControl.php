<?php

class FooterControl
{
    function loadRelatedPageLink($pathToPage)
    {
        if (isset($pathToPage) && $pathToPage != "") {
            $display = 'Related Page';
        } else {
             $display = "<p>No Page Linked</p>";
             return $display;
        }
        $return = '<a class="btn btn-primary "  href="' . $pathToPage . '">' . $display . '</a>';
        return $return;
    }
}