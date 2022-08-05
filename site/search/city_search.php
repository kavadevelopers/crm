<?php
include_once('../config/config.php');
if(isset($_GET['term']))
{
    $query = $con->query("select * from `cities` where `name` LIKE '%".$con->real_escape_string($_GET['term'])."%' ");
	while ($row = $query->fetch_assoc()) {
        $json[]=array(
				'label'=> $row['name'],
				'value'=> $row['name']
				);
	}

echo json_encode($json);
}


?>
