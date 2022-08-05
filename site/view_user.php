<?php include_once('header.php'); ?>
<?php include_once('sidebar.php'); ?>
<title><?= company ?> | View User </title>
<?php

if( !isset($_GET['id']) )
{
	echo "<script>window.location='manage_user.php';</script>";
	exit;
}
else if($_GET['id'] == '')
{
	echo "<script>window.location='manage_user.php';</script>";
	exit;
}
$edit_user = $con->query("select * from user where id = '".$_GET['id']."'")->fetch_object();
 ?>
<div class="content-wrapper">
    
    <section class="content-header">
		<h1>
			View User
		</h1>
		<ol class="breadcrumb">
			<li class=""><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
	        <li class=""><a href="manage_user.php"><i class="fa fa-user"></i> Manage User</a></li>
	        <li class="active"> View User</li>
      	</ol>
    </section>

<form action="process/edit_user.php" method="post" id="submit" enctype="multipart/form-data">
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
										<label for="name">Name</label>
										<input type="hidden" name="user_id" id="user_id" value="<?php echo $edit_user->id; ?>" />
										<input type="text" class="form-control" value="<?php echo $edit_user->name; ?>" id="name" name="name" autocomplete="off" spellcheck="false" placeholder="Name" readonly>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="username">User Name</label>
										<input type="text" class="form-control" value="<?php echo $edit_user->user; ?>" id="username" onkeyup="unit_check();" name="username" autocomplete="off" spellcheck="false" placeholder="User Name" readonly>
										<b><p style="color:red; padding-left: 5px;" id="error_unit"></p></b>
										<input type="hidden" id="hid" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" id="email" value="<?php echo $edit_user->email; ?>" class="form-control" name="email" autocomplete="off" spellcheck="false" placeholder="Email" readonly>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="mobile">Mobile</label>
										<input type="text" id="mobile" maxlength="10" value="<?php echo $edit_user->mobile; ?>"  pattern="[0-9]{10}" class="form-control" name="mobile" autocomplete="off" spellcheck="false" placeholder="Mobile" readonly>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Password</label>
											<div class="input-group">
												<input type="text" class="form-control" id="input1" value="<?php echo $edit_user->password; ?>" name="np" placeholder="Enter New Password" autocomplete="off" spellcheck="false" readonly>
												<div class="input-group-addon" href="javascript:;" onclick="toggler1(this)" style="cursor: pointer"><i class="glyphicon glyphicon-eye-open"></i></div>
											</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="state">User Type</label>
											<select id="type" name="type" class="form-control" disabled>
												<option value="">-- User Type --</option>
												<option value="1" <?php if($edit_user->auth == 1){ echo "selected"; } ?>>Admin</option>
												<option value="2" <?php if($edit_user->auth == 2){ echo "selected"; } ?>>Staff</option>
											</select>
									</div>
								</div>
								<div class="col-md-6">
									<label for=""><u>Select Companies For User</u></label>
										<div class="form-group">
											<?php if($company->num_rows > 0){while($companys = $company->fetch_object()){ ?>
												<input type="checkbox" name="array[]" id="<?php echo $companys->id; ?>" value="<?php echo $companys->id; ?>" <?php company_match($companys->id,$edit_user->c_id); ?> disabled/>&nbsp;&nbsp;&nbsp;<label for="<?php echo $companys->id; ?>"><?php echo $companys->name; ?></label><br>
											<?php } } ?>
										</div>
								</div>
								<div class="col-md-6">
									<span class="btn btn-default btn-file" style="margin:10px auto; display:table;">
										<img class="profile-user-img img-responsive img-circle" id="blah" style="width:35% !important;" src="<?php echo $edit_user->image; ?>" alt="User profile picture">
									</span>
								</div>
							</div>
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
		var user_id = $('#user_id').val();
		$.ajax({
			type: 'POST',
			url: 'search/user_check_edit.php',
			data: 'username='+unit+'&user_id='+user_id,
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