<?php

include_once('../config/config.php');

				foreach($_POST['array'] as $val)
				{
					$update = $con->query("UPDATE `lead_master` SET `assign_for` = '".$_POST['to_transfer']."' WHERE `id` = '".$val."'");
				}

	
				$_SESSION['msg'] = 'Lead Transfered';
				header("location:../import_transfer.php?id=4");
				exit;

?>