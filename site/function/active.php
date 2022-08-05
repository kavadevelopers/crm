<?php

function menu($array)
{
	$path = basename($_SERVER['SCRIPT_NAME']);
	foreach($array as $a)
	{
		if($path === $a)
		{
			echo "active";
			break;
		}
	}
}


?>