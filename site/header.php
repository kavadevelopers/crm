<?php include_once('config/config.php'); 

 
if(!isset($_SESSION['id']))
{
	$_SESSION['emsg'] = "Please Sign In First";
	header('location:../index.php');
	exit;
}
if(!isset($_SESSION['pass']))
{
	header('location:../lock.php');
	exit;
}

 include_once('query.php');
 include_once('function/active.php');

?>



<!DOCTYPE html>
<html>
<head>
    <title><?= company ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
 
  <script src="plugins/jQuery/jquery-3.2.1.js"></script>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="font/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="inicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="build/select2.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="plugins/jQueryUI/jquery-ui.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="js/datatables.net/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="js/datatables.net/css/dataTables.tableTools.min.css">
	<style>
		
		.ui-autocomplete { max-height: 200px; overflow-y: scroll; overflow-x: hidden;}
		.ui-menu .ui-menu-item {
			padding: 2px 0 2px 2px !important;
		}		
		.lm {
			border-radius: 20px !important;
			padding: 3px 7px;
			font-size: 10px;
		}
		.select2-selection__choice
		{
			background-color: #3c8dbc !important;
			border-color: #367fa9 !important;
		}
		.select2-selection__choice__remove
		{
			color: rgba(255,255,255,0.7) !important;
		}
		@media (max-width: 767px){
		.skin-blue .main-header .navbar .dropdown-menu li a {
		    /* color: #fff; */
		    color: #000 !important;
		}
    }

    .post {
    border-bottom: 1px solid #d2d6de;
    margin-bottom: 0; 
    padding-bottom:0; 
    margin-top: 5px;
    color: #666;
    }
    .post .user-block {
    margin-bottom: 5px;
    }


    .datepicker table tr td:first-child {
      color: red
    }
   .datepicker-today {
    background: #fcc !important;
    }
	</style>
  <style>
.loader 
{
 position: fixed;
 left: 0px;
 top: 0px;
 width: 100%;
 height: 100%;
 z-index: 9999;
 background: url('image/loding.gif') 50% 50% no-repeat rgb(249,249,249);
}
</style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="loader">
</div>
  <script type="text/javascript">
$(window).on('load', function() {
  $(".loader").fadeOut("slow");
})
</script>
<div class="wrapper">

  <header class="main-header">
    <a href="" class="logo">
      <span class="logo-mini"><b><?php if($user->auth == '0'){ echo company; } else { echo get_company($con,$user->c_id); } ?></b></span>
      <span class="logo-lg"><b><?php if($user->auth == '0'){ echo company; } else { echo get_company($con,$user->c_id); } ?></b> </span>
    </a>
    <nav class="navbar navbar-static-top">
       <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		
				 <li>
            <a href="" title="Refresh Page" ><i class="fa fa-refresh"></i></a>
          </li>
				  <li>
            <a href="../lock_make.php" title="Lock" ><i class="fa fa-lock"></i></a>
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $user->image; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $user->name; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?php echo $user->image; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $user->name; ?>
                </p>
				 <p><b><?php if($user->auth == '0'){ echo "SuperAdmin"; }else if($user->auth == '1'){ echo "Admin"; }else{ echo "Staff"; } ?></b></p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-primary btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-danger btn-flat">Sign out</a>
                </div>
				
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>