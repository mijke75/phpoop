<?php

	// Include page start to make sure we have everything we need for this page
    require_once($_SERVER['DOCUMENT_ROOT'] . '/_includes/page_start.php');

    // Let's add a specific stylesheet for this page
    $page->addStylesheet('/_content/css/example.css');


    // Let's set a theme
    $page->setTheme('green');

    // Now is the time to overwrite the default menu, header or footer (or not and just leave it default)
     $page->setMenu('custom');
     $page->setHeader('custom');
     $page->setFooter('custom');


    // Let's start writing content
    $page->startContent();

    // Include content from content folder. Make sure you use the same name!
    include $_SERVER['DOCUMENT_ROOT'] . '/_content/' . $_SERVER['PHP_SELF'];

	// All the above is the content, we're done
    $page->endContent();


    // Include content from content folder. Make sure you use the same name!
    $page->setSidebar('examplelist');

    // We are ready to flush everything into the template
    echo $page->render('sidebar.left');


    // Include page end to clean up any mess we created
    require_once($_SERVER['DOCUMENT_ROOT'] . '/_includes/page_end.php');
?>