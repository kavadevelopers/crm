<?php

include_once('../config/config.php');

				foreach($_POST['array'] as $val)
				{
					$update = $con->query("DELETE FROM `lead_master` WHERE `id` = '".$val."'");
				}

	
				$_SESSION['msg'] = 'Lead Deleted';
				header("location:../user_wise.php?id=".$_GET['id']."&type=3");
				exit;

?>