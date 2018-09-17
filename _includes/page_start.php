<?php
    // Debug Mode will give information when things fail. Remove this line in production
    require_once(__DIR__ . "/debug_mode.php");

    // Autoload will make sure classes are always loaded if they don't exist on initiation
    require_once(__DIR__ . "/../_classes/_autoload.php");

    // Let's start everything we need for our Page e.g. sessions, database connections, security objects and of course our Page Object

    session_start();

    $result = array();
    if(file_exists(__DIR__ . '/../_classes/database.class.php')){

        global $db;
        $db = new Database();

        $result = array();

        // We've got a connection to the database
        if($db->connect()) {
            // Let's get this page from database
            $db->sql('SELECT * FROM pages WHERE pageName = LOWER("' . strtolower($_SERVER['PHP_SELF']) . '")');
            $result = $db->getResult();
        }
    }

    global $page;
    // Let's load all the information from the database into a Page Object
    if(count($result) > 0){
        $page = new Page($result[0]);
    }
    else {
        $page = new Page();
    }


    // Let's include content |(it will be flushed, so we can alter it if we want in the specific page
//    $page->startContent();
//
//    // Include content from content folder. Make sure you use the same name!
//    include $_SERVER['DOCUMENT_ROOT'] . '/_content' . $_SERVER['PHP_SELF'];
//
//    // All the above is the content, we're done
//    $page->endContent();


?>