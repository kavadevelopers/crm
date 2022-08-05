<?php
include_once('config/config.php');
include_once('query.php');
if(isset($_SESSION['id'])){
$india = $con->query("SELECT * FROM `india` WHERE `c_id` = '1'")->fetch_object();
	
if(!empty($india->mobile) && !empty($india->key_id))
{
	$start_date = date("d", strtotime($india->last_date)).'-'.strtoupper(date("M", strtotime($india->last_date))).'-'.date("Y", strtotime($india->last_date));
	if(dateDiff($start_date,date('d-m-Y')) > 3){
		$end_new = date('Y-m-d', strtotime("+3 day", strtotime($india->last_date)));
		$end_date = strtoupper(date("d", strtotime($end_new))).'-'.strtoupper(date("M", strtotime($end_new))).'-'.strtoupper(date("Y", strtotime($end_new)));
		$end_time = "00:00:00";
	}
	else{
		$end_date = date("d").'-'.strtoupper(date("M")).'-'.date("Y");
		$end_time = date('H:i:s');
	}
$json = file_get_contents('http://mapi.indiamart.com/wservce/enquiry/listing/GLUSR_MOBILE/'.$india->mobile.'/GLUSR_MOBILE_KEY/'.$india->key_id.'/Start_Time/'.$start_date.'%20'.date("H:i:s", strtotime($india->last_time)).'/End_Time/'.$end_date.'%20'.$end_time.'/');
$obj = json_decode($json);
	
	
	//echo 'https://mapi.indiamart.com/wservce/enquiry/listing/GLUSR_MOBILE/'.$india->mobile.'/GLUSR_MOBILE_KEY/'.$india->key_id.'/Start_Time/'.$start_date.'%20'.date("H:i:s", strtotime($india->last_time)).'/End_Time/'.$end_date.'%20'.date('H:i:s').'/';
	//print_r($obj);
	//exit;

if(isset($obj->RESPONSE))
{
	if($obj->RESPONSE == 'NULL')
	{
		
	}
}
else
{
    //echo 'https://mapi.indiamart.com/wservce/enquiry/listing/GLUSR_MOBILE/'.$india->mobile.'/GLUSR_MOBILE_KEY/'.$india->key_id.'/Start_Time/'.date("d-m-Y", strtotime($india->last_date)).' '.$india->last_time.'/End_Time/'.date("d-m-Y").' '.date('H:i:s').'/';
    //exit;
    //echo "<pre>";
    //print_r($json);
    //exit;
	
	$count = 0;
	foreach($obj as $a => $key)
	{
		if(!empty($key->GLUSR_USR_COMPANYNAME))
		{
			$inq_company = $key->GLUSR_USR_COMPANYNAME;
		}
		else{
			$inq_company = $key->SENDERNAME;
		}
		if(!empty($inq_company) || !empty($key->MOB) || !empty($key->SENDEREMAIL)){
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
		
		$insert = $con->query("INSERT INTO `lead_master`(`serial`, `date`, `status`, `source`, `company`, `assign_for`, `priority`, `contact_date`) VALUES (
				'".$serial."',
				'".date("Y-m-d")."',
				'1',
				'4',
				'".$user->c_id."',
				'0',
				'Medium',
				'".date('Y-m-d')."'
				)");

			$id = $con->insert_id;
                $c_id = '99';
				if(!empty($key->COUNTRY_ISO))
				{
					$country = $con->query("SELECT * FROM `apps_countries` WHERE `country_code` = '".$key->COUNTRY_ISO."'");
					if($country->num_rows > 0)
					{
						$countryr = $country->fetch_object();
						$c_id = $countryr->id;
					}
				}else
				{
					$c_id = '99';
				}

				

				$detail = $con->query("INSERT INTO `lead_company_detail`(`id`,`name`, `email`, `mobile`,`mobile2`, `address`, `city`, `state`, `country`, `c_person`, `description`, `lead_id`) VALUES (
					'".$id."',
					'".$con->real_escape_string(trim($inq_company))."',
					'".$con->real_escape_string(trim($key->SENDEREMAIL))."',
					'".$con->real_escape_string($key->MOB)."',	
					'".$con->real_escape_string($key->MOBILE_ALT)."',	
					'".$con->real_escape_string(trim($key->ENQ_ADDRESS))."',
					'".$con->real_escape_string(trim($key->ENQ_CITY))."',
					'".$con->real_escape_string(trim($key->ENQ_STATE))."',
					'".$c_id."',
					'".$con->real_escape_string(trim($key->SENDERNAME))."',
					'".$con->real_escape_string(trim($key->ENQ_MESSAGE))."',
					'".$id."'
				)");
		}
	}
	if($count > 0){
		$update = $con->query("UPDATE `india` SET  `last_date` = '".date('Y-m-d',strtotime($end_date))."', `last_time` = '".date('H:i:s',strtotime($end_time))."' WHERE `c_id` = '".$user->c_id."'");
	}
	exit;
}
}
else
{
	
}
}
function dateDiff($date1, $date2)  //days find function
{ 
	$diff = strtotime($date2) - strtotime($date1); 
	return abs(round($diff / 86400)); 
}
function url_get_contents ($Url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}