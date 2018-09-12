<?php

class FooterControl
{
    function loadRelatedPageLink($pathToPage)
    {
        if ($pathToPage != "") {
            $display = 'Related Page';
        } else {
            $display = "No Page Linked";
            $pathToPage = '#';
        }
        $return = '<a class="btn btn-primary " href="' . $pathToPage . '">' . $display . '</a>';
        return $return;
    }
}