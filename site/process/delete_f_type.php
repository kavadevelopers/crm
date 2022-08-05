<?php 
include_once('../config/config.php');
if(isset($_GET['id']))
{
	
	$insert = $con->query("UPDATE `f_type` SET `df`= '1' where `id` = '".$_GET['id']."'");

	if( $insert )
	{
		$_SESSION['msg'] = "FollowUp Type Deleted";
		header("location:../manage_followup_type.php");
		exit;
	}
	else
	{
		$_SESSION['emsg'] = "Error In Deleted FollowUp Type Please Try Again";
		header("location:../manage_followup_type.php");
		exit;
	}
}
else
{
	$_SESSION['emsg'] = "Somthing Went Wrong Try Again";
	header("location:../manage_followup_type.php");
	exit;
}	

?>