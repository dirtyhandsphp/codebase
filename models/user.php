<?php

	/* User class corresponding to users table in database*/
	class User{
		
		var $id;
		var $name;
		var $email;
		
		/*Gets the list of all users*/
		function get_list(){
			$res = mysql_query('Select * from users');
			return mysql_fetch_all($res);
		}
		
		/*Adds new user to database*/
		function add(){
			$insert_query = "Insert into users values('','".mysql_real_escape_string($this->name)."','".mysql_real_escape_string($this->email)."')";
			mysql_query($insert_query);
			if(mysql_error()){
				return false;
			}else{
				return mysql_insert_id();
			}
		}
		
		/*Checks if email already exists in users table or not*/
		function emailAlreayExist(){
			$res = mysql_query("Select * from users where email = '".mysql_real_escape_string($this->email)."'");
			return mysql_num_rows($res);
		}
		
		function update(){
		
		}
		
		function delete(){
		
		}
	}

?>