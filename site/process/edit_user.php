<?php 

include_once('../config/config.php');

if( isset($_POST['submit']) )
{
	
	
	
	
	$query = $con->query("UPDATE `user` SET 
			`user` = '".$con->real_escape_string(trim($_POST['username']))."',
			`email` = '".$con->real_escape_string(trim($_POST['email']))."',
			`name` = '".$con->real_escape_string(trim($_POST['name']))."',
			`password` = '".$con->real_escape_string(trim($_POST['np']))."',
			`mobile` = '".$con->real_escape_string(trim($_POST['mobile']))."',
			`auth` = '".$con->real_escape_string(trim($_POST['type']))."',
			`c_id` = '".$con->real_escape_string(trim($_POST['Company']))."'
			WHERE `id` = '".$_POST['user_id']."'
		");
	if($query)
	{
		$_SESSION['msg'] = 'User Edited';
		header("location:../manage_user.php");
		exit;
	}
	else
	{
		$_SESSION['emsg'] = 'Error Please Try Again';
		header('location:../add_user.php');
		exit;
	}
}
else
{
	$_SESSION['emsg'] = 'Please Fill This Information';
	header('location:../add_user.php');
	exit;
}

 ?>