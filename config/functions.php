<?php
	//common functions
	
	//returns records array
	function mysql_fetch_all($res) {
	   $records = array();
	   while($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
		    $records[] = $row;
	   }
	   return $records;
	}
	
	/*
		checks if date is valid
		@param string $str date
	*/
	function isDateValid($str) {
		if (substr_count($str, '/') == 2) {
			list($m, $d, $y) = explode('/', $str);
			return checkdate($m, $d, sprintf('%04u', $y));
		}
		return false;
	}

	/*
		checks if email is valid
		@param string $email email
	*/
	function isEmailValid($email){
		$regex = '/^[_a-z0-9-]+@[a-z0-9-]+(\.[a-z]{2,3})$/'; 
		if (preg_match($regex, $email))
			 return true;
		return false;
	}
	
	/*
		count number of days between today's date and due date
		@param string $due_date due date
	*/
	function countDays($due_date){
		list($m, $d, $y) = explode('/', $due_date);
		$due_date_timestamp = strtotime("$y-$m-$d 24:00:00");
		$today_timestamp = time();
		$diff = $due_date_timestamp - $today_timestamp;
		$days = floor($diff/(60*60*24));
		return $days;
	}
	
	/*
		checks if due date is equal to or greater than current date
		@param string $due_date due date
	*/
	function checkDueDate($due_date){
		list($m, $d, $y) = explode('/', $due_date);
		$due_date_timestamp = strtotime("$y-$m-$d");
		$today_timestamp = time();
		if(($due_date_timestamp-$today_timestamp) >= 0)
			return true;
		return false;
	}
	
	
?>