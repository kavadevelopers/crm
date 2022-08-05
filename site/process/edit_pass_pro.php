<?php 
include_once('../config/config.php');

$op = trim($_POST['old']);
$np = trim($_POST['np']);
$ncp = trim($_POST['ncp']);


if($op == $_SESSION['pass'])
{
	if($np == $ncp)
	{
		$q = $con->query("UPDATE `user` SET `password`= '".$np."' where id = '".$_POST['id']."'");
		if($q)
		{
			unset($_SESSION['pass']);
			unset($_SESSION['id']);
			$_SESSION['emsg'] = "Password Changed Sign In To Continue.";
			header('location:../../');
			exit;
		}
		else
		{
			$_SESSION['emsg'] = "Somthing Went Wrong Please Try Again";
			header('location:../edit_pass.php');
			exit;
		}
	}
	else
	{
		$_SESSION['emsg'] = "Password And Confirm Password Not Match Please Try Again";
		header('location:../edit_pass.php');
		exit;
	}
}
else
{
		$_SESSION['emsg'] = "Opps Old Password Not Match Please Try Again";
		header('location:../edit_pass.php');
		exit;
}

?>