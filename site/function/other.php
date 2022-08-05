<?php

		function company_search($con,$c_type)
		{
			$query_set = '';
			$user = $con->query("SELECT * FROM `user`");
			while($userr = $user->fetch_object())
			{
				$array = explode(",",$userr->c_id);
				foreach( $array as $val )
				{
					if( $c_type == $val )
					{
						$query_set .= 'OR `id` = "'.$userr->id.'" ';
					}
				}
			}
			return ltrim($query_set,'OR');
		}
		
		function company_match($company,$user)
		{
			$array = explode(",",$user);
				foreach( $array as $val )
				{
					if( $company == $val )
					{
						echo "checked";
					}
				}
		}
		
		function company_sub_select($user)
		{
			$query_set = '';
			$array = explode(",",$user);
				foreach( $array as $val )
				{
					$query_set .= 'OR `id` = "'.$val.'" ';
				}
				return ltrim($query_set,'OR');
		}
		
		
		function get_company($con,$company_id)
		{
			$company = $con->query("SELECT * FROM `company` WHERE `id` = '".$company_id."'")->fetch_object();
			return $company->name;
		}

		function get_source($con,$id)
		{
			$source = $con->query("SELECT * FROM `source` WHERE `id` = '".$id."'")->fetch_object();
			return $source->name;
		}

		function get_status($con,$id)
		{
			$status = $con->query("SELECT * FROM `status` WHERE `id` = '".$id."'")->fetch_object();
			return $status->name;
		}

		function priority($id)
		{
			if($id == "High")
			{
				$color = "red";
			}
			else if($id == "Medium")
			{
				$color = "yellow";
			}
			else
			{
				$color = "green";
			}
			
			return '<small class="label bg-'.$color.'">'.$id.'</small>';
		}
		

		function lead_name_search($con,$name)
		{
			$query = '';
			$sel_com_detail = $con->query('SELECT * FROM `lead_company_detail` WHERE `name` LIKE "%'.$name.'%" ');
			if($sel_com_detail->num_rows > 0){
				while($sel_com_detailr = $sel_com_detail->fetch_object())
				{
					$query .= 'OR `id` = "'.$sel_com_detailr->id.'" ';
				}
			}
			if(!empty($query))
			{
				return ltrim($query,'OR');
			}
			else
			{
				return '`id` = "0"';
			}
		}


		function status_lead($id){
			if($id == 0)
			{
				return "Open";
			}else if($id == 1)
			{
				return "Closer";
			}
			else if($id == 2)
			{
				return "Not Related";
			}
			else if($id == 3)
			{
				return "Customer";
			}
		}

		
		function get_user($con,$id)
		{
			$user = $con->query("SELECT * FROM `user` WHERE `id` = '".$id."'")->fetch_object();
			return $user->name;
		}

		function get_user_data($con,$id)
		{
			$user = $con->query("SELECT * FROM `user` WHERE `id` = '".$id."'")->fetch_object();
			return $user;
		}

		function get_follow_type($id)
		{
			if($id == 1)
			{
				return '<i class="fa fa-phone"></i>';
			}else if($id == 2)
			{
				return '<i class="fa fa-envelope"></i>';
			}else if($id == 4)
			{
				return '<i class="fa fa-whatsapp"></i>';
			}
			else if($id == 5)
			{
				return '<i class="fa fa-users"></i>';
			}
		}

		function get_country($con,$id){
			$s = $con->query("SELECT * FROM `apps_countries` WHERE `id` = '".$id."'")->fetch_object();
			return $s->country_name;
		}

?>