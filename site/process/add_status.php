<?php 

include_once('../config/config.php');

if( isset($_POST['submit']) )
{
	$query = $con->query("INSERT INTO `status`(`name`, `df`) VALUES ('".$con->real_escape_string(trim($_POST['name']))."','0')");
	if($query)
	{
		$_SESSION['msg'] = 'Status Added';
		header("location:../manage_status.php");
		exit;
	}
	else
	{
		$_SESSION['emsg'] = 'Error Please Try Again';
		header('location:../manage_status.php');
		exit;
	}
}
else
{
	$_SESSION['emsg'] = 'Please Fill This Information';
	header('location:../manage_status.php');
	exit;
}

 ?>