<?php
	
	include_once('../../config/core.php');
	include_once('../../models/user.php'); // includes User db class
	include_once('../../models/task.php'); // includes Task db class
	
	$errors      = array(); // errors array
	$messages    = array(); // messages array
	$task_detail = array();
	
	//create user object
	$user_ob = new User();
	$users = $user_ob->get_list();
		
	//checks if form is posted
	if(isset($_POST) && !empty($_POST)){
		$user_id  = $_POST['user_id'];
		$description = addslashes($_POST['description']);
		$due_date = addslashes($_POST['due_date']);
		
		$task_detail['user_id']  = $user_id;
		$task_detail['description'] = $description;
		$task_detail['due_date'] = $due_date;
		
		//checks if user is selected
		if($user_id == 0){
			$errors[] = 'Please select user name';
		}
		
		//checks if task description is entered
		if(trim($description) == ''){
			$errors[] = 'Task Description is mandatory';
		}
		
		//checks if task due date is entered
		if(trim($due_date) == ''){
			$errors[] = 'Due date is mandatory';
		}
		
		//Checks if due date is in proper format and not the past date as well
		if(strlen($due_date)){
			
			if(!isDateValid($due_date))
				$errors[] = 'Due date should be in proper format.';
			else if(!checkDueDate($due_date))
				$errors[] = 'Due date cannot be past date.';
		}
		
		//if no error then task would be added to the database
		if(!$errors){
			$task_ob = new Task();
			$task_ob->user_id  = $task_detail['user_id'];
			$task_ob->description  = $task_detail['description'];
			$task_ob->due_date    = $task_detail['due_date'];
			
			if(!$errors){
				if($task_ob->add()){
					$messages[] = 'Task Assigned Successfully.';
					$task_detail = array();
				}else{
					$errors[] = 'Some Internal Databse Occurs';
				}
			}
		}
	}
	
	
	include_once('../../templates/header.php');
	include_once('../../views/tasks/add.php');
	include_once('../../templates/footer.php');

	
?>