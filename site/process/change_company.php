<?php

include_once('../config/config.php');
            if(isset($_POST['array'])){
                
                $user_new = $con->query("SELECT * FROM `user` WHERE `c_id` = '".$_POST['to_transfer']."' AND `auth` = '1' ORDER BY `id` ASC LIMIT 1");
                
                if($user_new->num_rows > 0){
                    $user_new = $user_new->fetch_object();
                
    				foreach($_POST['array'] as $val)
    				{
    					$update = $con->query("UPDATE `lead_master` SET `company` = '".$_POST['to_transfer']."',`assign_for` = '".$user_new->id."' WHERE `id` = '".$val."'");
    				}
    
    	
    				$_SESSION['msg'] = 'Lead Transfered To Other Company';
    				header("location:../transfer_to_ocom.php");
    				exit;
                }
                
                else
                {
                    $_SESSION['emsg'] = 'There is No admin To Transfer Lead';
                    header("location:../transfer_to_ocom.php");
				    exit;
                }
            }
            else
            {
                header("location:../transfer_to_ocom.php");
				exit;
            }

?>