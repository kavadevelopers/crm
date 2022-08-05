<?php 
include_once('../config/config.php');

if( isset($_POST['submit']) )
{
	$users = '';
	foreach($_POST['User'] as $val)
	{
		$users .= $val.',';
	}
	
	$lead = $con->query("INSERT INTO `lead_master`(`serial`,`date`, `status`, `source`, `company`, `assign_for`, `priority`, `contact_date`) VALUES (
		'".$_POST['Id_Insert']."',
		'".implode("-", array_reverse(explode("/", $_POST['date'])))."',
		'".trim($_POST['Status'])."',
		'".trim($_POST['Source'])."',
		'".trim($_POST['Company'])."',
		'".rtrim($users,',')."',
		'".trim($_POST['Priority'])."',
		'".implode("-", array_reverse(explode("/", $_POST['cdate'])))."'
	)");
	
	
	$id = $con->insert_id;
	if($lead)
	{
		$detail = $con->query("INSERT INTO `lead_company_detail`(`id`,`name`, `email`, `mobile`,`mobile2`, `address`, `city`, `state`, `country`, `website`, `c_person`, `description`, `lead_id`) VALUES (
			'".$id."',
			'".$con->real_escape_string(trim($_POST['Name']))."',
			'".$con->real_escape_string(trim($_POST['email']))."',
			'".$con->real_escape_string(trim($_POST['mobile']))."',
			'".$con->real_escape_string(trim($_POST['mobile2']))."',
			'".$con->real_escape_string(trim($_POST['Address']))."',
			'".$con->real_escape_string(trim($_POST['City']))."',
			'".$con->real_escape_string(trim($_POST['State']))."',
			'".$con->real_escape_string(trim($_POST['Country']))."',
			'".$con->real_escape_string(trim($_POST['Website']))."',
			'".$con->real_escape_string(trim($_POST['Contact']))."',
			'".$con->real_escape_string(trim($_POST['Description']))."',
			'".$id."'
		)");
		
		
		
			if($detail)
			{
				$_SESSION['msg'] = 'Lead Created';
				header("location:../manage_lead.php");
				exit;
			}
			else
			{
				$con->query("DELETE FROM `lead_master` WHERE `id` = '".$id."'");
				$_SESSION['emsg'] = 'Error Please Try Again';
				header('location:../add_lead.php');
				exit;
			}
	}
	else
	{
		$_SESSION['emsg'] = 'Error Please Try Again';
		header('location:../add_lead.php');
		exit;
	}
}	
	

 ?>