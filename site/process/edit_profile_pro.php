<?php 
include_once('../config/config.php');


$query = $con->query("UPDATE `user` SET `name`='".$con->real_escape_string(trim($_POST['name']))."' , `email` = '".$_POST['email']."' where id = '".$_POST['id']."'");


if($query)
{
		$_SESSION['msg'] = "Profile Succssesfully Updated";
		header('location:../profile.php');
		exit;
}

?>