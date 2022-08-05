<?php include_once('site/config/config.php');  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sign in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="site/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="site/font/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="site/inicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="site/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="site/plugins/iCheck/square/blue.css">

 
</head>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		<!--<img id="Image1" src="site/image/<?= company ?>.png" style="width:70%;">-->
		<a href=""><b><?= company ?></b></a>
	</div>
	<div class="login-box-body">
  
		<p class="login-box-msg">Sign in to start your session</p>
	
		<div class="alert alert-danger" style="display:none;" id="fade">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
		</div>
		<div class="alert alert-success" style="display:none;" id="success_login">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			Login Success 
		</div>
		<?php if(isset($_SESSION['emsg'])){ ?>
			<div class="alert alert-danger" id="fade2">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<?php echo $_SESSION['emsg']; ?>
			</div>
		<?php } unset($_SESSION['emsg']);?>
		<?php if(isset($_SESSION['msg'])){ ?>
			<div class="alert alert-success" id="fade2">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<?php echo $_SESSION['msg']; ?>
			</div>
		<?php } unset($_SESSION['msg']);?>
		<form action="" id="login" method="post">
			 
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="User Name" id="email" autocomplete="off" spellcheck="false" required >
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
			  
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Password" autocomplete="off" spellcheck="false" id="pass" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				
				<div class="row">
					<div class="col-xs-4">
						<button type="submit" name="submit" id="butn" class="btn btn-primary" ><div id="load" style="display:none;"><i style="margin:0 10px; 0 0" class="fa fa-spin fa-spinner"></i><span style="margin-right:10px;">Redirecting ...</span></div><div id="button">Sign In</div></button>
					</div>
				</div>
			
		</form>


	
    

	</div>
	<br/>
	<p class="login-box-msg"><i>Developed by</i> <a target="_blank" href="http://www.kavadevelopers.com">Kava Developers</a></p>
</div>
</body>	
<script src="site/plugins/jQuery/jquery-2.2.3.min.js"></script>

<script src="site/bootstrap/js/bootstrap.min.js"></script>

<script src="site/plugins/iCheck/icheck.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#login').submit(function(){
				var email = $('#email').val();
				var pass = $('#pass').val();
				$.ajax({
					method : "POST",
					url : "login.php",
					data : "email="+email+"&pass="+pass,
					dataType: "JSON",
					success:function( out ){
						if(out[0] == 'true')
						{
							$('#fade').fadeOut();
							$('#fade2').fadeOut();
							$('#button').hide();
							$('#butn').css('opacity','1');
							$('#load').show();
							$('#butn').prop('disabled', true);
							$('#success_login').fadeIn();
								setTimeout(function(){
									window.location = 'site/'; }, 2000
								);
						}
						else
						{
							$('#fade').fadeIn(function(){
								$('#fade').html(out[0]);
							});
						}
					}
				});
				return false;
			});
		});
	</script>
</html>
