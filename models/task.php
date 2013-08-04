<?php

	/* Task class corresponding to tasks table in database*/
	
	class Task{
		
		var $id;
		var $user_id;
		var $description;
		var $due_date;
		
		/*Gets the list of all tasks assigned to all users*/
		function get_list(){
			$res = mysql_query('Select t.id, t.user_id, t.description, t.due_date, u.name from tasks t, users u where t.user_id = u.id');
			if($res)
				return mysql_fetch_all($res);
			return false;
		}
		
		/*Gets the tasks detail of particular user*/
		function getUserTask(){
			$res = mysql_query('Select t.id, t.description, t.due_date, u.id, u.name from tasks t, users u where t.user_id = u.id and t.user_id = '.mysql_real_escape_string($this->user_id));
			if($res)
				return mysql_fetch_all($res);
			else if(mysql_error())
				return false;
			return false;
		}
		
		/*Adds new task to database*/
		function add(){
			$insert_query = "Insert into tasks values('','".mysql_real_escape_string($this->user_id)."','".mysql_real_escape_string($this->description)."','".mysql_real_escape_string($this->due_date)."')";
			mysql_query($insert_query);
			if(mysql_error()){
				return false;
			}else{
				return mysql_insert_id();
			}
			return false;
		}
		
		function update(){
		
		}
		
		function delete(){
		
		}
	}

?>