<?php 
include_once('../config/config.php');

if( isset($_POST['submit']) )
{
	
	
		$name = "image/f3.png";
	
	
		
	
	$query = $con->query("INSERT INTO `user`(`user`, `email`, `name`, `image`, `password`, `mobile`,`auth`,`created_by`,`c_id`) VALUES (
		'".$con->real_escape_string(trim($_POST['username']))."',
		'".$con->real_escape_string(trim($_POST['email']))."',
		'".$con->real_escape_string(trim($_POST['name']))."',
		'".$name."',
		'".$con->real_escape_string(trim($_POST['np']))."',
		'".$con->real_escape_string(trim($_POST['mobile']))."',
		'".$con->real_escape_string(trim($_POST['type']))."',
		'".trim($_SESSION['id'])."',
		'".trim($_POST['Company'])."'
	)");
	
	
	
	if($query)
	{
		$_SESSION['msg'] = 'User Successfully Created';
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