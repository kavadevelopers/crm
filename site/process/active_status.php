<?php 
include_once('../config/config.php');

if(isset($_GET['a_id']))
{
	$insert = $con->query("UPDATE `status` SET `df` = '1' WHERE `id` = '".$_GET['a_id']."'");

	if( $insert )
	{
		$_SESSION['msg'] = "Status Deleted";
		header("location:../manage_status.php");
		exit;
	}
	else
	{
		$_SESSION['emsg'] = "Error In Active Status Please Try Again";
		header("location:../manage_status.php");
		exit;
	}
}
else
{
	$_SESSION['emsg'] = "Somthing Went Wrong Try Again";
	header("location:../manage_status.php");
	exit;
}	


?>