<?php include_once('header.php'); ?>
<?php include_once('sidebar.php'); ?>
<title><?= company ?> | Edit User Profile</title>
<div class="content-wrapper">
<section class="content-header">
      <h1>
        User Profile
       </h1>
      <ol class="breadcrumb">
			<li class=""><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
	        
	        <li class="active">Profile</li>
      	</ol>
    </section>
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
	<?php $q = $con->query("select * from user where id = '".$_SESSION['id']."'")->fetch_object(); ?>
    <div class="row">
        <div class="col-md-6">
			<div class="box box-primary">
				<div class="box-body box-profile">
					<img class="profile-user-img img-responsive img-circle" style="width:35% !important;" src="<?php echo $q->image; ?>" alt="User profile picture">
					<h3 class="profile-username text-center"><?php echo $q->email; ?></h3>
					<h3 class="text-muted text-center"><?php echo $q->name; ?></h3>
					<ul class="list-group list-group-unbordered">
						
					</ul>

					  <a href="edit_profile.php" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
				</div>
			</div>
		</div>
	</div>
</section>
</div>



<?php include_once('footer.php'); ?>