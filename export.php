<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include('site/config/config.php');
$result = $con->query("SELECT * FROM `lead_master` WHERE `company` = '2'");
$ids = '';
while($row = $result->fetch_object()){
	$ids .= ','.$row->id;	
}
$ids = ltrim($ids,',');
$result = $con->query("SELECT * FROM `lead_company_detail` WHERE `lead_id` in ($ids)");
if (!$result) die('Couldn\'t fetch records');
$num_fields = mysqli_num_fields($result);
$headers = array();
for ($i = 0; $i < $num_fields; $i++) {
    $headers[] = mysqli_fetch_field_direct($result , $i)->name;
}

$fp = fopen('php://output', 'w');
if ($fp && $result) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="export.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    fputcsv($fp, $headers);
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        fputcsv($fp, array_values($row));
    }
    die;
}
?>