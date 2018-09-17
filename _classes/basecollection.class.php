<?php

    // This is an example of a collection containing objects
    class BaseCollection {

        // To applicate this collection generic to multiple implementations we set the database table and the name of the child class
        // This must be set in the constructor for each collection that inherits from this base
        protected $myTable = 'OVERIDE THIS PROPERTY IN EXTENDED CLASS WITH TABLE NAME FOR THAT COLLECTION';
        protected $childClass = 'OVERIDE THIS PROPERTY IN EXTENDED CLASS WITH CHILD CLASS NAME OF THAT COLLECTION';

        protected $collection = array();

        public function __construct() {
    	}

        public function __destruct() {
            // clean up here
        }

    	// Load Objects from the database into this Collection; optional give a WHERE or ORDERBY clause
    	public function load($where='', $order='') {
            if($GLOBALS['db']->connect()) {
        	    $GLOBALS['db']->select($this->myTable, '*', '', $where, $order);
            	$result = $GLOBALS['db']->getResult();
            	foreach ($result as $row) {

                    $child = new $this->childClass($row);
            		array_push($this->collection, $child);
            	}

            	return $this->collection;
            }
    	}

    	// Add an Object to this Collection; it will also be added to the database using the add method of the Child Object
        public function add($obj, $key = null) {
            if ($key == null) {
                $this->collection[] = $obj;
                $obj->add();
            }
            else {
                if (isset($this->collection[$key])) {
                    throw new KeyHasUseException("Key $key already in use.");
                }
                else {
                    $this->collection[$key] = $obj;
                    $obj->add();
                }
            }
        }

        // Delete an Object from this Collection; it will also be deleted from the database using the delete method of the Child Object
        public function delete($key) {
            if (isset($this->collection[$key])) {
                $this->collection[$key]->delete();
                unset($this->collection[$key]);
            }
            else {
                throw new KeyInvalidException("Invalid key $key.");
            }
        }

        // Save an Object from this Collection; it will also be saved to the database using the save method of the Child Object
        public function save($key) {
            if (isset($this->collection[$key])) {
                $this->collection[$key]->save();
            }
            else {
                throw new KeyInvalidException("Invalid key $key.");
            }
        }

        // Save all Objects from this Collection; it will also be saved to the database using the save method of each Child Object
        public function saveAll() {
            foreach ($this->collection as $key => $value) {
                $this->save($key);
            }
        }

        // Get an Object from this Collection
        public function get($key) {
            if (isset($this->collection[$key])) {
                return $this->collection[$key];
            }
            else {
                throw new KeyInvalidException("Invalid key $key.");
            }
        }

        // Get all keys in use by this Collection
        public function keys() {
            return array_keys($this->collection);
        }

        // Get total number of Objects in this Collection
        public function length() {
            return count($this->collection);
        }

        // Check if key exists in this Collection
        public function keyExists($key) {
            return isset($this->collection[$key]);
        }
    }
?>