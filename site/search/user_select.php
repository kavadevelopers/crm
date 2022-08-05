<?php
include_once('../config/config.php');
include_once('../query.php');
$company = $_POST['company'];
$data = '';$array = [];
if(!empty(company_search($con,$company)))
{
	$data .= ' WHERE ('.company_search($con,$company).')';
	$user = $con->query("SELECT * FROM `user`".$data);
	while($userr = $user->fetch_object())
	{
		array_push($array,'<option value="'.$userr->id.'">'.$userr->name.'</option>');
	}
}

		
       


echo json_encode($array);



?>
