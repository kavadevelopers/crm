<?php
include_once('config/config.php');
include_once('query.php');

$india = $con->query("SELECT * FROM `trade_india` WHERE `c_id` = '".$user->c_id."'")->fetch_object();
if(!empty($india->user_id) && !empty($india->profile_id) && !empty($india->key_id))
{
$json = file_get_contents('http://www.tradeindia.com/utils/my_inquiry.html?userid='.$india->user_id.'&profile_id='.$india->profile_id.'&key='.$india->key_id.'&from_date='.$india->date.'&to_date='.date('Y-m-d'));
	
$obj = json_decode($json);
	
if($obj != 'Sorry! You are not authorized to view this.')
{
	

	$update = $con->query("UPDATE `trade_india` SET  `date` = '".date('Y-m-d')."' WHERE `c_id` = '".$user->c_id."'");
	
	$count = 0;
	foreach($obj as $a => $key)
	{
		$check_same = $con->query("SELECT `l_id` FROM `check_trade` WHERE `l_id` = '".$key->rfi_id."'");
		if($check_same->num_rows == 0)
		{
		$count++;
		$lead_insert = $con->query("SELECT * FROM `lead_master` WHERE `company` = '".$user->c_id."' ORDER BY `id` DESC LIMIT 1");
    		if($lead_insert->num_rows > 0)
    		{
    			$lead_insertr = $lead_insert->fetch_object();
    			$number_last = preg_replace('/[^0-9]/', '',$lead_insertr->serial);
    			$number_last += 1;
    			$serial = substr(get_company($con,$user->c_id),0,2).'_'.$number_last;
    		}
    		else
    		{
    			$serial = substr(get_company($con,$user->c_id),0,2).'_1';
    		}
		
		$check = $con->query("INSERT INTO `check_trade`(`l_id`, `date`) VALUES ('".$key->rfi_id."','".date('Y-m-d')."')");
		$insert = $con->query("INSERT INTO `lead_master`(`serial`, `date`, `status`, `source`, `company`, `assign_for`, `priority`, `contact_date`) VALUES (
				'".$serial."',
				'".date("Y-m-d")."',
				'1',
				'3',
				'".$user->c_id."',
				'0',
				'Medium',
				'".date('Y-m-d')."'
				)");
    
			$id = $con->insert_id;
                $c_id = '99';
				if(!empty($key->sender_country))
				{
					$country = $con->query("SELECT * FROM `apps_countries` WHERE `country_name` = '".$key->sender_country."'");
					if($country->num_rows > 0)
					{
						$countryr = $country->fetch_object();
						$c_id = $countryr->id;
					}
					else
					{
					    $c_id = '99';
					}
				}
				else
				{
					$c_id = '99';
				}

				if(!empty($key->sender_co))
				{
					$inq_company = $key->sender_co;
				}
				else{
					$inq_company = $key->sender_name;
				}

				$detail = $con->query("INSERT INTO `lead_company_detail`(`id`,`name`, `email`, `mobile`, `city`, `state`, `country`, `c_person`, `description`, `lead_id`) VALUES (
					'".$id."',
					'".$con->real_escape_string(trim($inq_company))."',
					'".$con->real_escape_string(trim($key->sender_email))."',
					'".$con->real_escape_string(trim($key->sender_mobile))."',	
					'".$con->real_escape_string(trim($key->sender_city))."',
					'".$con->real_escape_string(trim($key->sender_state))."',
					'".$c_id."',
					'".$con->real_escape_string(trim($key->sender_name))."',
					'".$con->real_escape_string(trim($key->message))."',
					'".$id."'
				)");
	}

	}
}

}
else
{
	
}


