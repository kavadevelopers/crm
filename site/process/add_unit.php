<?php 

include_once('../config/config.php');

if( isset($_POST['submit']) )
{
	$query = $con->query("INSERT INTO `company`(`name`, `email`, `mobile`, `address`, `gstin`, `iec`, `pan`, `cin`, `dl`, `scode`, `state`,`ip`) VALUES (
		'".$con->real_escape_string(trim($_POST['name']))."',
		'".$con->real_escape_string(trim($_POST['email']))."',
		'".$con->real_escape_string(trim($_POST['mobile']))."',
		'".$con->real_escape_string(trim($_POST['address']))."',
		'".$con->real_escape_string(trim($_POST['GSTIN']))."',
		'".$con->real_escape_string(trim($_POST['IEC']))."',
		'".$con->real_escape_string(trim($_POST['PAN']))."',
		'".$con->real_escape_string(trim($_POST['CIN']))."',
		'".$con->real_escape_string(trim($_POST['DL']))."',
		'".$con->real_escape_string(trim($_POST['Statec']))."',
		'".$con->real_escape_string(trim($_POST['State']))."',
		 ".$con->real_escape_string(trim($_POST['c_ip_new']))."'
	)");

	$id = $con->insert_id;

	$india = $con->query("INSERT INTO `india`(`mobile`, `key_id`,`last_date`, `last_time`,`c_id`) VALUES (
		'".$con->real_escape_string(trim($_POST['in_mobile']))."',
		'".$con->real_escape_string(trim($_POST['in_key']))."',
		'".date('Y-m-d')."',
		'".date('H:i:s')."',
		'".$id."'
	)");
	
	$trade = $con->query("INSERT INTO `trade_india`(`user_id`, `profile_id`, `key_id`, `date`,`c_id`) VALUES (
		'".$con->real_escape_string(trim($_POST['trade_user']))."',
		'".$con->real_escape_string(trim($_POST['trade_profile']))."',
		'".$con->real_escape_string(trim($_POST['trade_key']))."',
		'".date('Y-m-d')."',
		'".$id."'
	)");


	
	if($query)
	{
		$_SESSION['msg'] = 'Company Successfully Added';
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