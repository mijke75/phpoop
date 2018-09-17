<?php

    // This is an example of an Object which can be retrieved, updated, saved and deleted from a database
    class Example extends BaseClass {

        // Add private properties which are not in the base class
        private $name;
        private $description;

        // This function will fire when this Object is created
        function __construct($dbRow = '') {
            $this->myTable = 'examples';
            $this->myID    = 'exampleID';

            parent::__construct($dbRow);
        }

        // get Name value from Object
        public function getName() {
            return $this->name;
        }

        // set Name value to Object
        public function setName($value) {
            // Save this change into the changeObj
            $this->changeObj['exampleName'] = $value;
            $this->name = $value;
        }

        // Add specific functions for this class which are not in the base class
        public function getDescription()
        {
            return $this->description;
        }

        public function setDescription($value)
        {
            $this->changeObj['exampleDescription'] = $value;
            $this->description = $value;
        }

        // Create an Object from all properties of this class
        public function getObj()
        {
            // First retrieve the Obj as made by the base class
            $obj = parent::getObj();

            // Add additional specific fields for this Object
            $obj['exampleName']        = $this->name;
            $obj['exampleDescription'] = $this->description;
            
            return $obj;
        }

        // Update all properties of this class from the given Object
        protected function setObj($obj)
        {
            // First set the Obj by the base class
            parent::setObj($obj);

            // Set additional specific fields for this Object
            $this->name        = (isset($obj['exampleName'])        ? $obj['exampleName']        : '');
            $this->description = (isset($obj['exampleDescription']) ? $obj['exampleDescription'] : '');
        }

    }
?>