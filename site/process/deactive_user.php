<?php 
include_once('../config/config.php');
if(isset($_GET['id']))
{
	
	$insert = $con->query("UPDATE `user` SET `df`= '1' where `id` = '".$_GET['id']."'");

	if( $insert )
	{
		$_SESSION['msg'] = "User De-Activated";
		header("location:../manage_user.php");
		exit;
	}
	else
	{
		$_SESSION['emsg'] = "Error In De-Activated User Please Try Again";
		header("location:../manage_user.php");
		exit;
	}
}
else
{
	$_SESSION['emsg'] = "Somthing Went Wrong Try Again";
	header("location:../manage_user.php");
	exit;
}	

?>