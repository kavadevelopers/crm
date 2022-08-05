<?php 
include_once('site/config/config.php');
unset($_SESSION['pass']);
header('location:lock.php');
exit;
 ?>