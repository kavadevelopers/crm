<?php 

    include_once('config/config.php');
    
    $sel_blank = $con->query("SELECT * FROM `lead_company_detail` WHERE `name` = '' AND `email` = '' AND `mobile` = ''"); 
    $a = 0;
    while($r = $sel_blank->fetch_object())
    {
        $a++;
        $con->query("DELETE FROM `lead_master` WHERE `id` = '".$r->lead_id."'");
        $con->query("DELETE FROM `lead_company_detail` WHERE `lead_id` = '".$r->lead_id."'");
        
    }
    
    echo $a;
    

?>