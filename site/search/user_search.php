<?php
include_once('../config/config.php');
if(isset($_GET['term']))
{
    $query = $con->query("select * from `user` where `name` LIKE '%".$con->real_escape_string($_GET['term'])."%' AND `id` != '1'");
while ($row = $query->fetch_assoc()) {
        $json[]=array(
				'label'=> $row['name'],
				'value'=> $row['name']
				);
	}

echo json_encode($json);
}


?>
