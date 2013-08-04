<?php
	
	include_once('../../config/core.php');
	include_once('../../models/task.php');
	
	//creates task object
	$task_ob = new Task();
	
	//gets list of all tasks
	$tasks = $task_ob->get_list(); 
	
	include_once('../../templates/header.php');
	include_once('../../views/tasks/index.php');
	include_once('../../templates/footer.php');

	
?>