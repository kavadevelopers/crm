<?php
ini_set("allow_url_fopen", 1);
$json = file_get_contents('https://mapi.indiamart.com/wservce/crm/crmListing/v2/?glusr_crm_key=mR22G71o5HvGQfej53eC7lGGplrElTk=&start_time=02-JAN-2022%2000:00:00&end_time=08-JAN-2022%2016:44:19');
print_r($json);
$obj = json_decode($json);

//echo $json;
print_r($obj);echo "<br>";echo "<br>";
//exit;

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'http://mapi.indiamart.com/wservce/enquiry/listing/GLUSR_MOBILE/9898399377/GLUSR_MOBILE_KEY/MTU4MDEwMTI5MS4yNTMzIzE2NDAxMDcx/Start_Time/14-JAN-2020%2000:00:00/End_Time/21-JAN-2020%2016:44:19/');
$result = curl_exec($ch);
curl_close($ch);

$obj = json_decode($result);
print_r($obj);
?>