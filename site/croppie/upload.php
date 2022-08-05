<?php
include_once('../config/config.php');
$croped_image = $_POST['image'];
list($type, $croped_image) = explode(';', $croped_image);
list(, $croped_image)      = explode(',', $croped_image);
$croped_image = base64_decode($croped_image);	
$image_name = md5(microtime(true)).'.png';
// upload cropped image to server 
file_put_contents('../image/'.$image_name, $croped_image);
$image_name = 'image/'.$image_name;
$old_image = $con->query("SELECT * FROM `user` WHERE `id` = '".$_SESSION['id']."'")->fetch_object();
if($old_image->image != 'image/f3.png')
{
	unlink('../'.$old_image->image);
}

$update = $con->query("UPDATE `user` SET `image` = '".$image_name."' WHERE `id` = '".$_SESSION['id']."'");
?>