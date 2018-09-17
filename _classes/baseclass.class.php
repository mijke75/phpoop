<?php

    // This is an example of an Object which can be retrieved, updated, saved and deleted from a database
    class BaseClass {

        // To applicate this collection generic to multiple implementations we set the database table and ID field
        // This must be set in the constructor for each collection that inherits from this base
        protected $myTable = 'OVERIDE THIS PROPERTY IN EXTENDED CLASS WITH TABLE NAME FOR THAT OBJECT';
        protected $myID    = 'OVERIDE THIS PROPERTY IN EXTENDED CLASS WITH FIELD NAME FOR THE ID OF THAT OBJECT';

        // private properties which will contain the values from the database
        protected $id;
        protected $created;
        protected $creator;
        protected $edited;
        protected $editor;

        // Change Object keeps track of any changes we make in the Object compared to the initial state
        protected $changeObj = array();

        // This function will fire when this Object is created
        function __construct($dbRow = '') {
            // Check if row (or id) is given for this Object
            if($dbRow != ''){
                // If it's numeric, we have an ID and we can get it from the database
                if(is_numeric($dbRow)){
                    $GLOBALS['db']->select($this->myTable,'*','',$this->myID . '=' . $dbRow );
                    $dbResult = $GLOBALS['db']->getResult();

                    // setObj will load the information from the database into this Object
                    $this->setObj($dbResult[0]);
                }
                else
                    $this->setObj($dbRow);
            }
            else
                $this->setObj(0);
        }

        public function __destruct() {
            // clean up here
        }


        // get ID value from Object
        public function getID() {
            return $this->id;
        }

        public function getCreated($format='Y-m-d') 
        {
            $date = new DateTime($this->created); 
            return $date->format($format);
        }

        public function getCreator() {
            return $this->creator;
        }

        public function getEdited($format='Y-m-d') 
        {
            $date = new DateTime($this->edited); 
            return $date->format($format);
        }

        public function getEditor() {
            return $this->editor;
        }

        // Add this Object to the database
        public function add() 
        {
            // Let's check if anything has changed to prevent adding empty objects to the database
            if(count($this->changeObj) > 0 ){
                $this->changeObj['created'] = date('Y-m-d H:i:s');
                $this->changeObj['creator'] = 0; // This can be attached to a userID
                $GLOBALS['db']->insert($this->myTable, $this->changeObj);
                $dbResult = $GLOBALS['db']->getResult();

                unset($changeObj);
                $changeObj = array();

                // return Value will be the ID of the newly created record in the database
                return $dbResult[0];
            }
            else {
                // return 0 to inform there's no record added to the database
                return 0;
            }
        }

        // Save this Object to the database
        public function save()
        {
            // Let's check if anything has changed to prevent unnecessary database calls
            if(count($this->changeObj) > 0 ){                
                $this->changeObj['edited'] = date('Y-m-d H:i:s');
                $this->changeObj['editor'] = 0; // This can be attached to a userID
                $GLOBALS['db']->update($this->myTable, $this->changeObj, $this->myID . '=' . $this->id);

                unset($changeObj);
                $changeObj = array();
            }
        }

        // Delete this Object from the database
        public function delete()
        {
            // Confirmation should be done before calling this function, so immediately delete the record from the database
            $GLOBALS['db']->delete($this->myTable, $this->myID . '=' . $this->id);

            unset($changeObj);
            $changeObj = array();
        }
        

        // Create an Object from all properties of this class
        public function getObj()
        {
            $obj = array();

            $obj[$this->myID] = $this->id;
            $obj['created']    = $this->created;
            $obj['creator']    = $this->creator;
            $obj['edited']     = $this->edited;
            $obj['editor']     = $this->editor;
            
            return $obj;
        }

        // Update all properties of this class from the given Object
        protected function setObj($obj)
        {
            // There should always be an ID, other fields might be empty
            $this->id      = $obj[$this->myID];
            $this->created = (isset($obj['created']) ? $obj['created'] : '');
            $this->creator = (isset($obj['creator']) ? $obj['creator'] : '');
            $this->edited  = (isset($obj['edited'])  ? $obj['edited']  : '');
            $this->editor  = (isset($obj['editor'])  ? $obj['editor']  : '');
        }

    }
?>