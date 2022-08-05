<?php

include_once('../config/config.php');
			

				
				$update = $con->query("UPDATE `lead_master` SET `assign_for` = '".$_POST['user']."' WHERE `id` = '".$_POST['id']."'");
				$_SESSION['msg'] = 'Lead Transfered';
				exit;

?>