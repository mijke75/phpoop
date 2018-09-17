<?php

    // Clean up 'mess' e.g. close database connections

    if(file_exists('/../classes/database.class')) {
        $GLOBALS['db']->disconnect();
    }
?>