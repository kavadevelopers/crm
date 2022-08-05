<?php 
include_once('../config/config.php');
if(isset($_GET['id']))
{
	$insert = $con->query("DELETE FROM `lead_master` WHERE `id` = '".$_GET['id']."'");
	$insert2 = $con->query("DELETE FROM `lead_company_detail` WHERE `id` = '".$_GET['id']."'");

	if( $insert )
	{
		?>
		<script>
			//alert('Lead Deleted');
			window.close();
		</script>
		<?php
		//$_SESSION['msg'] = "Lead Deleted";
		//header("location:../import_transfer.php?id=".$_GET['f_id']);
		exit;
	}
	else
	{
		$_SESSION['emsg'] = "Error In Delete Lead Please Try Again";
		header("location:../import_transfer.php?id=".$_GET['f_id']);
		exit;
	}
}
else
{
	$_SESSION['emsg'] = "Somthing Went Wrong Try Again";
	header("location:../import_transfer.php?id=".$_GET['f_id']);
	exit;
}	

?>