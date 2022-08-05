<?php
include_once('../config/config.php');
$data = explode(',',$_POST['leads']);

foreach($data as $key => $value){
	$insert = $con->query("DELETE FROM `lead_master` WHERE `id` = '".$value."'");
	$insert2 = $con->query("DELETE FROM `lead_company_detail` WHERE `id` = '".$value."'");
}

?>