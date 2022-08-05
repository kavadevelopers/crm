<?php 
if(isset($_POST['unit']))
{
	include_once('../config/config.php');
	$unit = $con->query("SELECT `name` FROM `source` WHERE `name` = '".$_POST['unit']."' AND `df` = '0'");
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