<?php 
include_once('../config/config.php');
if(isset($_GET['d_id']))
{
	$insert = $con->query("UPDATE `company` SET `df` = '1' WHERE `id` = '".$_GET['d_id']."'");

	if( $insert )
	{
		$_SESSION['msg'] = "Company De-Activated";
		header("location:../manage_company.php");
		exit;
	}
	else
	{
		$_SESSION['emsg'] = "Error In De-Activate Company Please Try Again";
		header("location:../manage_company.php");
		exit;
	}
}

if(isset($_GET['a_id']))
{
	$insert = $con->query("UPDATE `company` SET `df` = '0' WHERE `id` = '".$_GET['a_id']."'");

	if( $insert )
	{
		$_SESSION['msg'] = "Company Activated";
		header("location:../manage_company.php");
		exit;
	}
	else
	{
		$_SESSION['emsg'] = "Error In Activate Company Please Try Again";
		header("location:../manage_company.php");
		exit;
	}
}


?>