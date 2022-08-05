<?php 
include_once('../config/config.php');

if( isset($_POST['submit']) )
{
	$users = '';
	foreach($_POST['User'] as $val)
	{
		$users .= $val.',';
	}
	
	$lead = $con->query("UPDATE `lead_master` SET
		`date` = '".implode("-", array_reverse(explode("/", $_POST['date'])))."',
		`status` = '".trim($_POST['Status'])."',
		`source` = '".trim($_POST['Source'])."',
		`company` = '".trim($_POST['Company'])."',
		`assign_for` = '".rtrim($users,',')."',
		`priority` = '".trim($_POST['Priority'])."',
		`contact_date` = '".implode("-", array_reverse(explode("/", $_POST['cdate'])))."'
		WHERE `id` = '".$_POST['lead_id']."'
	");



		$detail = $con->query("UPDATE `lead_company_detail` SET
			`name` = '".$con->real_escape_string(trim($_POST['Name']))."',
			`email` = '".$con->real_escape_string(trim($_POST['email']))."',
			`mobile` = '".$con->real_escape_string(trim($_POST['mobile']))."',
			`mobile2` = '".$con->real_escape_string(trim($_POST['mobile2']))."',
			`address` = '".$con->real_escape_string(trim($_POST['Address']))."',
			`city` = '".$con->real_escape_string(trim($_POST['City']))."',
			`state` = '".$con->real_escape_string(trim($_POST['State']))."',
			`country` = '".$con->real_escape_string(trim($_POST['Country']))."',
			`website` = '".$con->real_escape_string(trim($_POST['Website']))."',
			`c_person` = '".$con->real_escape_string(trim($_POST['Contact']))."',
			`description` = '".$con->real_escape_string(trim($_POST['Description']))."'
			WHERE `id` = '".$_POST['lead_id']."'
		");
		
		
			if($detail)
			{
				$_SESSION['msg'] = 'Lead Edited';
				header("location:../add_follow.php?id=".$_POST['lead_id']."&type=".$_POST['TYpe_hid']);
				exit;
			}
			else
			{
				$_SESSION['emsg'] = 'Error Please Try Again';
				header('location:../add_follow.php?id='.$_POST['lead_id']."&type=".$_POST['TYpe_hid']);
				exit;
			}
}	
	
 ?>