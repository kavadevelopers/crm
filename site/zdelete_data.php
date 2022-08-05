<?php
include_once('config/config.php');
include_once('query.php');


$indiamart = $con->query("SELECT * FROM `lead_master`   Where `assign_for` = '0' AND `source` = '4'"); 

while($res = $indiamart->fetch_object())
{
    // $con->query("delete from `lead_company_detail` WHERE `lead_id` = '".$res->id."'");
    // $con->query("delete from `lead_master` WHERE `id` = '".$res->id."'");
   
}

?>