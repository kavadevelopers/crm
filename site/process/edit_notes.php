<?php 

include_once('../config/config.php');
	
	$query = $con->query("UPDATE `notes` SET `descr` = '".$con->real_escape_string(trim($_POST['type']))."' WHERE `id` = '".trim($_POST['id'])."'");
	if($query)
	{
		$_SESSION['msg'] = 'Note Updated';
		exit;
	}
	else
	{
		$_SESSION['emsg'] = 'Error Please Try Again';
		exit;
	}

	
	
	