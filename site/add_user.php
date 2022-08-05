<?php include_once('header.php'); ?>
<?php include_once('sidebar.php'); ?>
<title><?= company ?> | Add User </title>
<?php
if( $user->auth == 2 )
{
	echo "<script>window.location='index.php';</script>";
	exit;
}
?>
<div class="content-wrapper">
    
    <section class="content-header">
		<h1>
			Add User
		</h1>
		<ol class="breadcrumb">
			<li class=""><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
	        <li class=""><a href="manage_user.php"><i class="fa fa-user"></i> Manage User</a></li>
	        <li class="active"> Add User</li>
      	</ol>
    </section>

<form action="process/add_user.php" method="post" id="submit" enctype="multipart/form-data">
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
        <div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-body">
						<div class="box-header with-border">
							<h3 class="box-title"> Fillup Information</h3>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-6">
									<div class="form-group">
										<label for="name">Name *</label>
										<input type="text" class="form-control" id="name" name="name" autocomplete="off" spellcheck="false" placeholder="Name" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="username">User Name *</label>
										<input type="text" class="form-control" id="username" onkeyup="unit_check();" name="username" autocomplete="off" spellcheck="false" placeholder="User Name" required>
										<b><p style="color:red; padding-left: 5px;" id="error_unit"></p></b>
										<input type="hidden" id="hid" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" id="email" class="form-control" name="email" autocomplete="off" spellcheck="false" placeholder="Email" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="mobile">Mobile</label>
										<input type="text" id="mobile" maxlength="10"  pattern="[0-9]{10}" class="form-control" name="mobile" autocomplete="off" spellcheck="false" placeholder="Mobile">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Password *</label>
											<div class="input-group">
												<input type="password" class="form-control" id="input1" name="np" placeholder="Enter New Password" autocomplete="off" spellcheck="false" required>
												<div class="input-group-addon" href="javascript:;" onclick="toggler1(this)" style="cursor: pointer"><i class="glyphicon glyphicon-eye-open"></i></div>
											</div>
									</div>
								</div>
								
										<input type="hidden" name="user_img" class="form-control" accept="image/*" id="fli" placeholder="Upload Photo">
								
								
							<?php if($user->auth == '0'){ ?>
								<div class="col-md-6">
									<div class="form-group">
										<label for="state">User Type *</label>
											<select id="type" name="type" class="form-control" required >
												<option value="">-- User Type --</option>
												<?php if($user->auth == '0'){ ?><option value="1">Admin</option><?php } ?>
												<option value="2" <?php if($user->auth == '1'){ echo "selected"; }?>>Staff</option>
											</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="Company">Company *</label>
											<select id="Company" name="Company" class="form-control" required >
												<option value="">-- Company --</option>
												<?php while($companys = $company->fetch_object()){ ?>
													<option value="<?php echo $companys->id; ?>"><?php echo $companys->name; ?></option>
												<?php } ?>
											</select>
									</div>
								</div>
							<?php }else{ ?>
								<input type="hidden" name="type" value="2">
								<input type="hidden" name="Company" value="<?php echo $user->c_id; ?>">
							<?php } ?>
							</div>
						</div>	
					</div>
					<div class="box-body">
						<div class="box-footer">
							<button type="submit" name="submit" class="btn btn-primary pull-right">Add</button>
							<a href="manage_user.php" class="btn btn-default">Cancel</a>
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