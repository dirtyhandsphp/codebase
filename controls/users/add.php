<?php
	
	include_once('../../config/core.php');
	include_once('../../models/user.php'); //includes user db class
	
	$errors      = array(); //errors array
	$messages    = array(); // messages array
	$user_detail = array(); 
	
	//checks is form is posted
	if(isset($_POST) && !empty($_POST)){
		$name  = $_POST['name'];
		$email = $_POST['email'];
		
		$user_detail['name']  = $name;
		$user_detail['email'] = $email;
		
		//checks if user name is entered
		if(trim($name) == ''){
			$errors[] = 'User Name is mandatory';
		}
		
		//checks if email address is entered
		if(trim($email) == ''){
			$errors[] = 'Email Address is mandatory';
		}
		
		//checks if email address is valid
		if(strlen($email)){
			if(!isEmailValid($email))
				$errors[] = 'Email address should be in proper format';
		}
			
		//if no error user would be entered into database
		if(!$errors){
			$user_ob = new User();
			$user_ob->name  = $user_detail['name'];
			$user_ob->email = $user_detail['email'];
			
			if($user_ob->EmailAlreayExist())
				$errors[] = 'Email already exists';
			if(!$errors){
				if($user_ob->add()){
					$messages[] = 'User Added Successfully.';
					$user_detail = array();
				}else{
					$errors[] = 'Some Internal Databse Occurs';
				}
			}
		}
	}
	
	include_once('../../templates/header.php');
	include_once('../../views/users/add.php');
	include_once('../../templates/footer.php');
?>