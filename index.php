<?php

	// Include page start to make sure we have everything we need for this page
    require_once('_includes/page_start.php');

    // Set the page title
// ((This page retrieves the title from the database))
    // $page->setTitle('OOP with PHP Example');

    // We can add specific stylesheets and javascript to this page
    $page->addStylesheet('/_modules/example/example.css');
    $page->addJavascript('/_modules/example/example.js');


    // Now is the time to overwrite the default menu, header or footer (or not and just leave it default)
// ((This page retrieves the menu, header and footer from the database))
    // $page->setMenu('/_includes/menus/custom.menu.php');
    // $page->setHeader('/_includes/headers/custom.header.php');
    // $page->setFooter('/_includes/footers/custom.footer.php');


    // Let's start writing content
    $page->startContent();

    // Include content from content folder. Make sure you use the same name!
    include '_content/' . $_SERVER['PHP_SELF'];

	// All the above is the content, we're done
    $page->endContent();


    // We are ready to flush everything into the template
// ((This page retrieves the template from the database, so we can just call render))
    echo $page->render();


    // Include page end to clean up any mess we created
    require_once('_includes/page_end.php');
?>