<?php include_once('header.php'); ?>
<?php include_once('sidebar.php'); ?>

<title><?= company ?> | Edit Profile</title>
<div class="content-wrapper">
	<link rel="stylesheet" href="croppie/croppie.css">
<section class="content-header">
      <h1>
        Edit Profile
       </h1>
      <ol class="breadcrumb">
			<li class=""><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
	        <li class="active"><a href="profile.php">Profile</a></li>
	        <li class="active">Edit Profile</li>
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
	<form method="post" action="process/edit_profile_pro.php" enctype='multipart/form-data' >
    <div class="row">
        <div class="col-md-6">
			<div class="box box-primary">
				<div class="box-body box-profile">
				<span class="btn btn-default" data-target="#modal-default" data-toggle="modal" style="margin:10px auto; display:table;" title="Click To Upload Image">
				
					<img class="profile-user-img img-responsive img-circle" id="blah" style="width:35% !important;" src="<?php echo $q->image; ?>" alt="User profile picture">
					
				</span>
					<div class="form-group">
						<label for="">Username</label>
						<input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>" />
						<input type="text" class="form-control" id="" name="user" value="<?php echo $q->user; ?>" placeholder="Enter Username" autocomplete="off" spellcheck="false" readonly>
					</div>
					<div class="form-group">
						<label for="">Full Name</label>
						<input type="text" class="form-control" id="" name="name" value="<?php echo $q->name; ?>" placeholder="Enter Full Name" autocomplete="off" spellcheck="false" required>
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="email" class="form-control" id="" name="email" value="<?php echo $q->email; ?>" placeholder="Enter Email" autocomplete="off" spellcheck="false" >
					</div>					
					<ul class="list-group list-group-unbordered">
						
					</ul>

					  <button type="submit" class="btn btn-primary"><b>Save</b></button>
					  <a href="edit_pass.php" class="btn btn-primary btn-danger">Change Password</a>
				</div>
			</div>
		</div>
	</div>
	</form>


		<div class="modal fade" id="modal-default" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Please Upload Image Here</h4>
              </div>
              <div class="row">
              	<div class="col-md-12">
		              	<div class="col-md-6 text-center">
							<div id="upload-image"></div>
			  			</div>
				  		<div class="col-md-6">
							<strong>Select Image:</strong>
							<br/>
							<input type="file" id="images" accept="image/*">
							<br/>
							<button class="btn btn-success cropped_image">Upload Image</button>
							<button style="display: none;" class="btn btn-success" id="cropped_image"><i class="fa fa-refresh fa-spin"></i>  Please Wait...</button>
				  		</div>			
				  		<div class="col-md-4 crop_preview">
							<div id="upload-image-i"></div>
				  		</div>
				  	</div>
				  </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>




</section>
</div>





<script type="text/javascript" src="croppie/upload.js"></script>

<?php include_once('footer.php'); ?>