<?php
include_once('config/config.php');
include_once('query.php');
if(isset($_SESSION['id'])){
	$india = $con->query("SELECT * FROM `india` WHERE `c_id` = '".$user->c_id."'")->fetch_object();
	if(!empty($india->mobile) && !empty($india->key_id)){
		$start_date = strtoupper(date("d-M-Y", strtotime($india->last_date)));

		
		if (strtotime($india->last_date) <= strtotime(date('d-m-Y'))) {

			$end_date = strtoupper(date("d-M-Y", strtotime('+6 day',strtotime($india->last_date)) ));
			$json = file_get_contents('https://mapi.indiamart.com/wservce/crm/crmListing/v2/?glusr_crm_key='.$india->key_id.'&start_time='.$start_date.'00:00:00&end_time='.$end_date.'%2023:59:59');
			
			$obj = json_decode($json);

			if(isset($obj->STATUS) && $obj->STATUS == 'SUCCESS'){
				if(isset($obj->TOTAL_RECORDS) && $obj->TOTAL_RECORDS > 0){
					$count = 0;
					foreach($obj->RESPONSE as $a => $key){
						if(!empty($key->SENDER_MOBILE) || !empty($key->SENDER_EMAIL)){
							$count++;

							$inq_company = $key->SENDER_NAME.' ('.$key->SENDER_COMPANY.')';

							$lead_insert = $con->query("SELECT * FROM `lead_master` WHERE `company` = '".$user->c_id."' ORDER BY `id` DESC LIMIT 1");
							if($lead_insert->num_rows > 0){
				    			$lead_insertr = $lead_insert->fetch_object();
				    			$number_last = preg_replace('/[^0-9]/', '',$lead_insertr->serial);
				    			$number_last += 1;
				    			$serial = substr(get_company($con,$user->c_id),0,2).'_'.$number_last;
				    		}else{
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
							if(!empty($key->SENDER_COUNTRY_ISO))
							{
								$country = $con->query("SELECT * FROM `apps_countries` WHERE `country_code` = '".$key->SENDER_COUNTRY_ISO."'");
								if($country->num_rows > 0)
								{
									$countryr = $country->fetch_object();
									$c_id = $countryr->id;
								}
							}else{
								$c_id = '99';
							}

							$detail = $con->query("INSERT INTO `lead_company_detail`(`id`,`name`, `email`, `mobile`,`mobile2`, `address`, `city`, `state`, `country`, `c_person`, `description`, `lead_id`) VALUES (
								'".$id."',
								'".$con->real_escape_string(trim($inq_company))."',
								'".$con->real_escape_string(trim($key->SENDER_EMAIL))."',
								'".$con->real_escape_string($key->SENDER_MOBILE)."',	
								'".$con->real_escape_string($key->SENDER_MOBILE_ALT)."',	
								'".$con->real_escape_string(trim($key->SENDER_ADDRESS))."',
								'".$con->real_escape_string(trim($key->SENDER_CITY))."',
								'".$con->real_escape_string(trim($key->SENDER_STATE))."',
								'".$c_id."',
								'".$con->real_escape_string(trim($key->SENDER_NAME))."',
								'".$con->real_escape_string(trim($key->QUERY_PRODUCT_NAME.' => '.$key->QUERY_MESSAGE))."',
								'".$id."'
							)");
						}
					}
				}	


				//next date update
				$update = $con->query("UPDATE `india` SET  `last_date` = '".date('Y-m-d',strtotime('+1 day',strtotime($end_date)))."' WHERE `c_id` = '".$user->c_id."'");
			}else{
				// echo "<pre>";
				// print_r($obj);
				// exit;
			}	

		}else{
			// echo "time is big"; 
		}

		
	}
}

$_SESSION['msg'] = 'India Mart Refreshed';