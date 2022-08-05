<?php include_once('header.php'); ?>
<?php include_once('sidebar.php'); ?>
<title><?= company ?> | Edit Company </title>
<?php
if( $user->auth != 0 )
{
	echo "<script>window.location='index.php';</script>";
	exit;
}
?>
	<?php
	if( !isset($_GET['id']) || empty($_GET['id']))
	{
		echo "<script>window.location='manage_company.php';</script>";
		exit;
	}
	$edit_company = $con->query("select * from company where id = '".$_GET['id']."'")->fetch_object();
	?>
<div class="content-wrapper">
    
    <section class="content-header">
		<h1>
			Edit Company
		</h1>
		<ol class="breadcrumb">
			<li class=""><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
	        <li class=""><a href="manage_company.php"><i class="fa fa-industry"></i> Manage Company</a></li>
	        <li class="active"> Edit Company</li>
      	</ol>
    </section>

<form action="process/edit_company.php" method="post" id="submit" enctype="multipart/form-data">
    <section class="content">
		<?php if(isset($_SESSION['emsg'])){ ?>
			<div class="alert alert-danger" id="fade">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<?php echo $_SESSION['emsg']; ?>
			</div>
		<?php } unset($_SESSION['emsg']);?>
		<?php if(isset($_SESSION['msg'])){ ?>
			<div class="alert alert-success" id="fade">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<?php echo $_SESSION['msg']; ?>
			</div>
		<?php } unset($_SESSION['msg']);?>
		<input type="hidden" name="id_edit" value="<?php echo $edit_company->id; ?>">
        <div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-body">
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-4">
									<div class="form-group">
										<label for="name">Company Name *</label>
										<input type="text" value="<?php echo $edit_company->name; ?>" class="form-control" id="name" name="name" autocomplete="off" spellcheck="false" placeholder="Company Name" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="email">Email *</label>
										<input type="email" value="<?php echo $edit_company->email; ?>" id="email" class="form-control" name="email" autocomplete="off" spellcheck="false" placeholder="Email" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="mobile">Mobile *</label>
										<input type="text" id="mobile" value="<?php echo $edit_company->mobile; ?>" maxlength="10"  pattern="[0-9]{10}" class="form-control" name="mobile" autocomplete="off" spellcheck="false" placeholder="Mobile" required>
									</div>
								</div>
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-4">
									<div class="form-group">
										<label for="address">Address *</label>
										<textarea id="address" class="form-control" name="address" autocomplete="off" spellcheck="false" placeholder="Address" required><?php echo $edit_company->address; ?></textarea>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="GSTIN">GSTIN</label>
										<input type="text" id="GSTIN" value="<?php echo $edit_company->gstin; ?>" class="form-control" maxlength="50" name="GSTIN" autocomplete="off" spellcheck="false" placeholder="GSTIN">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="IEC">IEC code</label>
										<input type="text" id="IEC" value="<?php echo $edit_company->iec; ?>" class="form-control" maxlength="100" name="IEC" autocomplete="off" spellcheck="false" placeholder="IEC code">
									</div>
								</div>
							</div>
						</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="PAN">PAN No.</label>
										<input type="text" id="PAN" value="<?php echo $edit_company->pan; ?>" class="form-control" maxlength="50" name="PAN" autocomplete="off" spellcheck="false" placeholder="PAN No.">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="CIN">CIN No.</label>
										<input type="text" id="CIN" class="form-control" value="<?php echo $edit_company->cin; ?>" maxlength="100" name="CIN" autocomplete="off" spellcheck="false" placeholder="CIN No.">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="DL">DL No.</label>
										<input type="text" id="DL" class="form-control" maxlength="100" value="<?php echo $edit_company->dl; ?>" name="DL" autocomplete="off" spellcheck="false" placeholder="DL No.">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="Statec">State Code *</label>
										<input type="text" id="Statec" value="<?php echo $edit_company->scode; ?>" class="form-control" maxlength="20" value="24" name="Statec" autocomplete="off" spellcheck="false" placeholder="State Code" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="State">State *</label>
										<input type="text" id="State" class="form-control" value="<?php echo $edit_company->state; ?>" maxlength="100" value="Gujarat" name="State" autocomplete="off" spellcheck="false" placeholder="State">
									</div>
								</div>
								<?php
									$india = $con->query("SELECT * FROM `india` WHERE `c_id` = '".$edit_company->id."'")->fetch_object();
									$trade = $con->query("SELECT * FROM `trade_india` WHERE `c_id` = '".$edit_company->id."'")->fetch_object();
								?>
								<div class="col-md-4">
									<div class="form-group">
										<label for="in_mobile">IndiaMart Mobile</label>
										<input type="text" id="in_mobile" class="form-control" value="<?php echo $india->mobile; ?>" maxlength="100" name="in_mobile" autocomplete="off" spellcheck="false" placeholder="IndiaMart Mobile">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="in_key">IndiaMart Key</label>
										<input type="text" id="in_key" class="form-control" maxlength="100" value="<?php echo $india->key_id; ?>" name="in_key" autocomplete="off" spellcheck="false" placeholder="IndiaMart Key">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="trade_user">TradeIndia Userid</label>
										<input type="text" id="trade_user" class="form-control" maxlength="100" value="<?php echo $trade->user_id; ?>" name="trade_user" autocomplete="off" spellcheck="false" placeholder="IndiaMart Mobile">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="trade_profile">TradeIndia Profile Id</label>
										<input type="text" id="trade_profile" class="form-control" value="<?php echo $trade->profile_id; ?>" maxlength="100" name="trade_profile" autocomplete="off" spellcheck="false" placeholder="TradeIndia Profile Id">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="trade_key">TradeIndia Key</label>
										<input type="text" id="trade_key" class="form-control" value="<?php echo $trade->key_id; ?>" maxlength="100" name="trade_key" autocomplete="off" spellcheck="false" placeholder="TradeIndia Key">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="c_ip_new">Company Ip </label>
										<input type="text" id="c_ip_new" class="form-control" value="<?php echo $edit_company->ip; ?>" maxlength="100" name="c_ip_new" autocomplete="off" spellcheck="false" placeholder="Company Ip" >
									</div>
								</div>
							</div>
						</div>	
					</div>
					<div class="box-body">
						<div class="box-footer">
							<a href="manage_company.php" class="btn btn-default">Cancel</a>
							<button type="submit" name="submit" class="btn btn-primary pull-right">Save</button>
							
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
</form>
					
</div>
<script>

function unit_check(){
		var unit = $('#username').val();
		$.ajax({
			type: 'POST',
			url: 'search/user_check.php',
			data: 'username='+unit,
			success: function (html) {
				if( html == 'true' )
				{
					$('#hid').val('1');
					$('#error_unit').fadeIn();
					
					$('#error_unit').html('Username Already Exists');
				}else
				{
					$('#hid').val('0');
					$('#error_unit').fadeOut();
				}
			}
		});
	}
	$(function(){
	$('#submit').submit(function(e){
		if( $('#hid').val() == '1' )
		{
			$('#username').focus();
			return false;
		}
		else
		{
			if($('#input1').val().length < 5)
			{
				alert("Password Length Must 5 Character");
				return false;
			}
			else
			{
				return true;
			}
		}
	});
});
function toggler1(e) {
        if( e.innerHTML == '<i class="glyphicon glyphicon-eye-open"></i>' ) {
            e.innerHTML = '<i class="glyphicon glyphicon-eye-close"></i>'
            document.getElementById('input1').type="text";
        } else {
            e.innerHTML = '<i class="glyphicon glyphicon-eye-open"></i>'
            document.getElementById('input1').type="password";
        }
}

</script>

<?php include_once('footer.php'); ?>