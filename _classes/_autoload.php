<?php
    // This function loads the code of a class when it's initiated but not included yet
    function __autoload($class) {
        include __DIR__ . "/" . strtolower($class) . ".class.php";
    }
?>