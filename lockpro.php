<?php
include_once('site/config/config.php');
$pass = trim($_POST['Lpass']);
if(!empty($pass))
{
	$pass = $con->real_escape_string($pass);
	$md5 = $pass;
	$query = $con->query("select * from user where id = '".$_SESSION['id']."'");
	if($query)
	{
		$res = $query->fetch_object();
		if($md5 === $res->password)
		{
			$_SESSION['pass'] = $md5;
			$_SESSION['timestamp'] = time();
			echo "true";
			exit;
		}
		else
		{
			echo "Username And Password Not Match.";
			exit;
		}
	}
	else
	{
		echo "Somthing Went Wrong Please Try Again";
		exit;
	}
}
?>