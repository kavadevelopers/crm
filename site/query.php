<?php
include_once('config/config.php');
if(!isset($_SESSION['id']))
{
	$_SESSION['emsg'] = "Please Sign In First";
	header('location:../index.php');
	exit;
}
include_once('function/other.php');
$user = $con->query("SELECT * FROM `user` WHERE id = '".$_SESSION['id']."'")->fetch_object();
 //    user
 
if($user->auth == 0)
{
	$company = $con->query("SELECT * FROM `company` WHERE `df` = '0'");
}
else
{
	$company = $con->query("SELECT * FROM `company` WHERE `df` = '0' AND ".company_sub_select($user->c_id));
}

if($user->auth == 0)
{
	$companyall = $con->query("SELECT * FROM `company`");
}
else
{
	$companyall = $con->query("SELECT * FROM `company` WHERE ".company_sub_select($user->c_id));
}

$status = $con->query("SELECT * FROM `status` WHERE `df` = '0'");
$statusAll = $con->query("SELECT * FROM `status`");
$source = $con->query("SELECT * FROM `source` WHERE `df` = '0'");
$sourceAll = $con->query("SELECT * FROM `source`");
$country = $con->query("SELECT * FROM `apps_countries`");
$state = $con->query("SELECT * FROM `states`");


if($user->auth != 0)
{
	$company_user = $con->query("SELECT * FROM `user` WHERE `c_id` = '".$user->c_id."'");
	$company_user2 = $con->query("SELECT * FROM `user` WHERE `c_id` = '".$user->c_id."'");
}
else
{
	$company_user = $con->query("SELECT * FROM `user` ");
}

$ftype = $con->query("SELECT * FROM `f_type` WHERE `df` = '0'");

?>