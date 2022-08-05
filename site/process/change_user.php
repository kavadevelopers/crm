<?php

include_once('../config/config.php');
            if(isset($_POST['array'])){
				foreach($_POST['array'] as $val)
				{
					$update = $con->query("UPDATE `lead_master` SET `assign_for` = '".$_POST['to_transfer']."' WHERE `id` = '".$val."'");
				}

	
				$_SESSION['msg'] = 'Lead Transfered';
				header("location:../lead_transfer.php");
				exit;
            }
            else
            {
                header("location:../lead_transfer.php");
				exit;
            }

?>