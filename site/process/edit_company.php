<?php 

include_once('../config/config.php');

if( isset($_POST['submit']) )
{
	$query = $con->query("UPDATE `company` SET 
		`name` = '".$con->real_escape_string(trim($_POST['name']))."',
		`email` = '".$con->real_escape_string(trim($_POST['email']))."',
		`mobile` = '".$con->real_escape_string(trim($_POST['mobile']))."',
		`address` = '".$con->real_escape_string(trim($_POST['address']))."',
		`gstin` = '".$con->real_escape_string(trim($_POST['GSTIN']))."',
		`iec` = '".$con->real_escape_string(trim($_POST['IEC']))."',
		`pan` = '".$con->real_escape_string(trim($_POST['PAN']))."',
		`cin` = '".$con->real_escape_string(trim($_POST['CIN']))."',
		`dl` = '".$con->real_escape_string(trim($_POST['DL']))."',
		`scode` = '".$con->real_escape_string(trim($_POST['Statec']))."',
		`state` = '".$con->real_escape_string(trim($_POST['State']))."',
		`ip` = '".$con->real_escape_string(trim($_POST['c_ip_new']))."'
		WHERE `id` = '".$_POST['id_edit']."'
	");


	$trade = $con->query("UPDATE `trade_india` SET `user_id` = '".$con->real_escape_string(trim($_POST['trade_user']))."', `profile_id` = '".$con->real_escape_string(trim($_POST['trade_profile']))."', `key_id` = '".$con->real_escape_string(trim($_POST['trade_key']))."' WHERE `c_id` = '".$_POST['id_edit']."'");

	$india = $con->query("UPDATE `india` SET `mobile` = '".$con->real_escape_string(trim($_POST['in_mobile']))."', `key_id` = '".$con->real_escape_string(trim($_POST['in_key']))."' WHERE `c_id` = '".$_POST['id_edit']."'");


	if($query)
	{
		$_SESSION['msg'] = 'Company Edited';
		header("location:../manage_company.php");
		exit;
	}
	else
	{
		$_SESSION['emsg'] = 'Error Please Try Again';
		header('location:../manage_company.php');
		exit;
	}
}
else
{
	$_SESSION['emsg'] = 'Please Fill This Information';
	header('location:../manage_company.php');
	exit;
}

 ?>