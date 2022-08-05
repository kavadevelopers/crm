<?php 
include_once('site/config/config.php');
$user = trim($_POST['email']);
$pass = trim($_POST['pass']);
if(!empty($user) && !empty($pass))
{
	$user = $con->real_escape_string($user);
	$pass = $con->real_escape_string($pass);
	$md5 = $pass;
	$query = $con->query("select * from user where user = '".$user."'");
	if($query)
	{
		$row = $query->num_rows;
		if($row === 1)
		{
			$res = $query->fetch_object();
			$get_ip_com = $con->query("select `ip` from company where id = '".$res->c_id."'")->fetch_object();
			if($md5 === $res->password)
			{
			    if($res->id != 1 && $res->auth != 1){
    			    if($get_ip_com->ip == get_client_ip($get_ip_com->ip)){
        				if($res->df == 1)
        				{
        					$array = array("Your Account Is Deleted Or Not Active Contact Administrator!");
        					echo json_encode($array);
        					exit;
        				}
        				else
        				{
        					$_SESSION['id'] = $res->id;
        					$_SESSION['pass'] = $md5;
        					$_SESSION['timestamp'] = time();
        					$array = array("true");
        					echo json_encode($array);
        					exit;
        				}
    			    }
    			    else
    			    {
    			        $array = array("Your Ip Not Match With Our Records Please Contact Administrator!");
        				echo json_encode($array);
        				exit;
    			    }
			    }else{
			        
			        if($res->df == 1)
        				{
        					$array = array("Your Account Is Deleted Or Not Active Contact Administrator!");
        					echo json_encode($array);
        					exit;
        				}
        				else
        				{
        					$_SESSION['id'] = $res->id;
        					$_SESSION['pass'] = $md5;
        					$_SESSION['timestamp'] = time();
        					$array = array("true");
        					echo json_encode($array);
        					exit;
        				}
        				
			    }
			}
			else
			{
				$array = array("Username And Password Not Match.");
				echo json_encode($array);
				exit;
			}
		}
		else
		{
			$array = array("Username Not Exists... Try With Different");
			echo json_encode($array);
			exit;
		}
	}
	else
	{
		$array = array("Somthing Went Wrong Please Try Again");
		echo json_encode($array);
		exit;
	}
}

function get_client_ip($cip) {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
        
        if(empty($cip)){
            return '';
        }
        else
        {
            return $ipaddress;
        }
}
?>