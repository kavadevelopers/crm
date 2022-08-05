<?php 
include_once('../config/config.php');
if(isset($_GET['c_id']))
{
	$insert = $con->query("UPDATE `company` SET `df` = '1' WHERE `id` = '".$_GET['c_id']."'");

	if( $insert )
	{
		$_SESSION['msg'] = "Company SuccessFully Deleted";
		header("location:../add_company.php");
		exit;
	}
	else
	{
		$_SESSION['emsg'] = "Error In Delete Company Please Try Again";
		header("location:../add_company.php");
		exit;
	}
}
else
{
	$_SESSION['emsg'] = "Somthing Went Wrong Try Again";
	header("location:../add_company.php");
	exit;
}	

?>