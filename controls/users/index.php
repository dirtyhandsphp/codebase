<?php
	
	include_once('../../config/core.php');
	include_once('../../models/user.php');
	
	//creates user object
	$user_ob = new User();
	
	//returns user list
	$users = $user_ob->get_list(); 
	
	include_once('../../templates/header.php');
	include_once('../../views/users/index.php');
	include_once('../../templates/footer.php');

	
?>