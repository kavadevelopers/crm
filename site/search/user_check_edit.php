<?php 
if(isset($_POST['username']))
{
	include_once('../config/config.php');
	
	$unit = $con->query("SELECT `user` FROM `user` WHERE `user` = '".$_POST['username']."' AND `id` != '".$_POST['user_id']."'");
	if($unit->num_rows > 0)
	{
		echo "true";
	}	
	else
	{
		echo "false";
	}
}
?>