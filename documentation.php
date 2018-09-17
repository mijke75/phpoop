<?php

	// Include page start to make sure we have everything we need for this page
    require_once('_includes/page_start.php');

    // Set the page title
     $page->setTitle('PHPOOP Documentation');

    // We can add specific stylesheets and javascript to this page
    $page->addStylesheet('/modules/example/example.css');
    $page->addJavascript('/modules/example/example.js');


    // Let's start writing content
    $page->startContent();

    // Include content from content folder. Make sure you use the same name!
    include $_SERVER['DOCUMENT_ROOT'] . '/_content/' . $_SERVER['PHP_SELF'];

	// All the above is the content, we're done
    $page->endContent();


    // We are ready to flush everything into the template
// ((This page retrieves the template from the database, so we can just call render))
    echo $page->render();


    // Include page end to clean up any mess we created
    require_once($_SERVER['DOCUMENT_ROOT'] . '/_includes/page_end.php');
?>