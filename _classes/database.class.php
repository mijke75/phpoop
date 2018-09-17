<?php
    // Database inherits from DbSettings. This class contains the database connection settings
    // Purpose is to be able to change the settings for another project or be able to update the database class without breaking code
    class Database extends DbSettings {

		/*
			TODO: add some more checks to give accurate feedback if SQL fails
			      prevent SQL injection
		*/


        private $connected  = false; 		// Check to see if the connection is active
        private $mysqli;
		private $result     = array(); 		// Any results from a query will be stored here
	    private $query      = "";			// used for debugging process with SQL return
	    private $numResults = "";			// used for returning the number of rows

        public function __construct() {
            parent::__construct();
        }

		// Function to make connection to database
		public function connect()
		{
			if(!$this->connected) {
				// Create connection
				$this->mysqli = new mysqli($this->server, $this->username, $this->password, $this->database);

				// Check connection
				if ($this->mysqli->connect_error) {
				    array_push($this->result, $this->mysqli->connect_error);
	                return false; // Problem connecting return FALSE
				} 
				else {
	                return true; // Connected return TRUE
	            } 
	        }
			else {  
	            return true; // Connection has already been made return TRUE 
	        }  	
		}
		
		// Function to disconnect from the database
	    public function disconnect()
		{
	    	// If there is a connection to the database
	    	if($this->connected) {
	    		// We have found a connection, try to close it
	    		if($this->mysqli->close()) {
	    			// We have successfully closed the connection, set the connection variable to false
	    			$this->connected = false;
					// Return true that we have closed the connection
					return true;
				}
				else {
					// We could not close the connection, return false
					return false;
				}
			}
	    }

		// Function to QUERY the database
    	public function sql($sql) {
    		$this->query = $sql;  // Pass back the SQL

    		$result = $this->mysqli->query($sql);
			if (isset($result->num_rows) && $result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
		            array_push($this->result, $row);
		    	}
		    }
		}

		// Function to SELECT from the database
		public function select($table, $rows = '*', $join = null, $where = null, $order = null, $limit = null) {

	        // Create query from the variables passed to the function
			$sql = 'SELECT ' . $rows . ' FROM ' . $table;

			if($join != null) {
				$sql .= ' JOIN ' . $join;
			}
	        
			if($where != null) {
	        	$sql .= ' WHERE ' . $where;
			}
	        
			if($order != null) {
	            $sql .= ' ORDER BY ' . $order;
			}
			
	        if($limit != null) {
	            $sql .= ' LIMIT ' . $limit;
	        }
			
	        $this->query = $sql; // Pass back the SQL

			// Check to see if the table exists and execute SQL
	        if($this->tableExists($table)) {
	        	$this->sql($sql);
	        }
		}

		// Function to insert into the database
	    public function insert($table, $params = array()) {

    	 	$sql='INSERT INTO `'.$table.'` (`'.implode('`, `',array_keys($params)).'`) VALUES ("' . implode('", "', $params) . '")';

	        $this->query = $sql; // Pass back the SQL

			// Check to see if the table exists and execute SQL
	        if($this->tableExists($table)) {
	        	if ($this->mysqli->query($sql) === TRUE) {
		            array_push($this->result, $this->mysqli->insert_id);
		        }
		        else {
		            array_push($this->result, 0);
		        }
	        }
		}
		
		//Function to delete table or row(s) from database
	    public function delete($table, $where = null) {

			if($where == null) {
				// Let's not accept this function for now. We need some more security
                $sql = 'DELETE ' . $table; // Create query to delete table
            }
			else {
                $sql = 'DELETE FROM ' . $table . ' WHERE ' . $where; // Create query to delete rows
            }

	        $this->query = $sql; // Pass back the SQL

			// Check to see if the table exists and execute SQL
	        if($this->tableExists($table)) {
	        	$this->sql($sql);
	        }
		}

		// Function to update row in database
	    public function update($table, $params=array(), $where) {

			// Create Array to hold all the columns to update
            $args=array();
			
			foreach($params as $field=>$value) {
				// Seperate each column out with it's corresponding value
				$args[]=$field.'="'.$value.'"';
			}
			
			// Create the query
			$sql='UPDATE '.$table.' SET '.implode(',',$args).' WHERE '.$where;
			
	        $this->query = $sql; // Pass back the SQL

			// Check to see if the table exists and execute SQL
	        if($this->tableExists($table)) {
	        	$this->sql($sql);
	        }
		}


		// Private function to check if table exists for use with queries
		private function tableExists($table) {
			$result = $this->mysqli->query('SHOW TABLES FROM ' . $this->database . ' LIKE "'.$table . '"');
	    
		    if ($result->num_rows > 0) {
                return true; // The table exists
            }
			else {
            	array_push($this->result, $table . " does not exist in this database");
                return false; // The table does not exist
            }
	    }

		// Public function to return the data to the user
	    public function getResult() {
	        $val = $this->result;
	        $this->result = array();
	        return $val;
	    }
	    
		//Pass the SQL back for debugging
	    public function getSql() {
	        $val = $this->query;
	        $this->query = array();
	        return $val;
	    }
		
	    //Pass the number of rows back
	    public function numRows() {
	        $val = $this->numResults;
	        $this->numResults = array();
	        return $val;
	    }
		
	    // Escape your string
	    public function escapeString($data) {
	        return mysqli_real_escape_string($data);
	    }

		}
?>