<?php 

include_once('../config/config.php');
include_once('../query.php');

if( isset($_POST['submit']) )
{
	if(isset($_POST['customer']))
	{
	if($_POST['customer'] == '1')
	{
		$check = 1;
	}
	else
	{
		$check = 0;
	}
}else
{
	$check = 0;
}
	$query = $con->query("INSERT INTO `notes`(`l_date`, `f_type`, `f_by`, `descr`, `l_id`,`f_time`) VALUES (
		'".implode("-", array_reverse(explode("/", $_POST['date'])))."',
		'".$_POST['ftype']."',
		'".$user->id."',
		'".$con->real_escape_string(trim($_POST['descr']))."',
		'".$_POST['lead_id_send']."',
		'".date('H:i:s',strtotime($_POST['time']))."'
	)");
	

	
	
	$upload_lead = $con->query("UPDATE `lead_master` SET `contact_date` = '".implode("-", array_reverse(explode("/", $_POST['ndate'])))."' ,`close` = '".$_POST['close']."',`customer` = '".$check."' WHERE `id` = '".$_POST['lead_id_send']."'");

	if($query && $upload_lead)
	{
		?>
		<script>
			//alert('Note Added');		
			window.close();
		</script>
		<?php
		//$_SESSION['msg'] = 'Note Added';
		//header("location:../followup.php?id=".$_POST['TYPE']);
		exit;
	}
	else
	{
		$_SESSION['emsg'] = 'Error Please Try Again';
		header("location:../followup.php?id=".$_POST['TYPE']);
		exit;
	}
}
else
{
	$_SESSION['emsg'] = 'Please Fill This Information';
	header('location:../followup.php?id=01');
	exit;
}

 ?>