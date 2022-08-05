<?php 
include('site/config/config.php');

$query = $con->query('SELECT * FROM `lead_company_detail` where `name` = "" and `email` = "" and `mobile` = "" and `c_person` = "" and `id` > 30000');

while($row = $query->fetch_object()){
	$con->query('DELETE FROM `lead_company_detail` WHERE `id` = "'.$row->id.'"');
	$con->query('DELETE FROM `lead_master` WHERE `id` = "'.$row->lead_id.'"');
}


?>