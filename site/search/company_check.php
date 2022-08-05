<?php 
if(isset($_POST['unit']))
{
	include_once('../config/config.php');
	$unit = $con->query("SELECT `name` FROM `company` WHERE `name` = '".$_POST['unit']."'");
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