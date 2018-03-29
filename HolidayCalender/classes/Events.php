<?php 
	/**
 	* Created by : Tirth Shah
	* Created at : 10:15 pm 29/3/2018
	* Modifications made : none
	*/
	class Events {
		private $connection;
   		public function __construct(){
	        global $database;
	        $this->connection = $database->getConnection();
    	}

    	/**
		 * @return $result_set is the result set of executed query
		 */
	    function viewEvents() {
	    	$sql = "SELECT * FROM events";
	    	$result_set = $this->connection->query($sql);
	    	return $result_set;
	    }

	    /**
	     * @param  $condition is a string having condition to select the HOLIDAYS table content no spaces (" ") need to be added before even if appended by user won't cause an issue
	     * @return $result_set is the result set of executed query
	     */
	    function viewEventsWithCondition($condition) {
	    	$sql = "SELECT * FROM events ".$condition;
	    	$result_set = $this->connection->query($sql);
	    	return $result_set;
	    }

        /**
         * The 3 functions below viz. insertEventInAjax , updateEventInAjax , deleteEventInAjax are the functions being called during ajax
         * Thus it has no parameters required
         * It works directly on the request from ajax (POST in this case)
         */
	    function insertEventInAjax() {
    		if(isset($_POST["title"])) {
				$query = "INSERT INTO events (title, start_event, end_event) VALUES (?, ?, ?)";
				if(!$prepared_statement = $this->connection->prepare($query)){
					die("ERROR ".$this->connection->error);
				}
				$title = $_POST['title'];
				$start = $_POST['start'];
				$end = $_POST['end'];
				$prepared_statement->bind_param("sss", $title , $start , $end);
				$prepared_statement->execute();
			}
	    }

	    function updateEventInAjax() {
	    	if(isset($_POST["id"])) {
				$query = "UPDATE events SET title= ?, start_event = ?, end_event = ? WHERE id = ?";
				if(!$prepared_statement = $this->connection->prepare($query)){
					die("ERROR ".$this->connection->error);
				}
				$title = $_POST['title'];
				$start = $_POST['start'];
				$end = $_POST['end'];
				$id = $_POST['id'];
				$prepared_statement->bind_param("sssi", $title , $start , $end , $id);
				$prepared_statement->execute();
			}
	    }

	    function deleteEventInAjax(){
	    	if(isset($_POST["id"])) {
				$query = "DELETE from events WHERE id=?";
				if(!$prepared_statement = $this->connection->prepare($query)){
					die("ERROR ".$this->connection->error);
				}
				$id = $_POST['id'];
				$prepared_statement->bind_param("i", $id);
				$prepared_statement->execute();
			}
	    }


	}//End of class	
?>