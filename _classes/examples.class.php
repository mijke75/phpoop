<?php

    // This is an example of a collection containing objects
    class Examples extends BaseCollection {

        public function __construct() {
            $this->myTable = 'examples';
            $this->childClass = 'Example';

            parent::__construct();
    	}

    }
?>