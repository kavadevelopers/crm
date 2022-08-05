<?php 

include_once('../config/config.php');

if( isset($_POST['submit']) )
{
	$query = $con->query("INSERT INTO `f_type`(`name`, `df`) VALUES ('".$con->real_escape_string($_POST['name'])."','0')");
	if($query)
	{
		$_SESSION['msg'] = 'FollowUp Type Added';
		header("location:../manage_followup_type.php");
		exit;
	}
	else
	{
		$_SESSION['emsg'] = 'Error Please Try Again';
		header('location:../manage_followup_type.php');
		exit;
	}
}
else
{
	$_SESSION['emsg'] = 'Please Fill This Information';
	header('location:../manage_followup_type.php');
	exit;
}

 ?>