<?php
	
	include_once('../../config/core.php'); 
	include_once('../../models/user.php'); //includes User db class 
	include_once('../../models/task.php'); //includes Task db class 
	
	$errors           = array();  // errors array
	$messages         = array();  // messages array
	$user_task_detail = array();
	
	
	$user_ob = new User(); 				//Create new users object
	$users = $user_ob->get_list();		//Gets list of all users
	
	//checks if form is posted or not
	if(isset($_POST) && !empty($_POST)){
		$user_id  = $_POST['user_id'];
				
		if($user_id == 0){
			$errors[] = 'Please select user name';
		}
		
		if(!$errors){
			$task_ob = new Task();
			$task_ob->user_id  = $user_id;
			$user_task_details  = $task_ob->getUserTask();
		}
	}
	
	include_once('../../templates/header.php');
	include_once('../../views/reports/index.php');
	include_once('../../templates/footer.php');

	
?>