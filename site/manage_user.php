<?php include_once('header.php'); ?>
<?php include_once('sidebar.php');  ?>
<title><?= company ?> | Manage User</title>
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
			Manage User
		</h1>
		<ol class="breadcrumb">
			<li class=""><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
	        <li class="active"><i class="fa fa-user"></i> Manage User</li>
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
        <div class="row" >
			<div class="col-md-12">
				<div class="box" style="overflow-x: scroll;">
					
						<div class="box-header">
							<h3 class="box-title">Users</h3>
								<a href="add_user.php" class="btn btn-success pull-right  btn-sm">Add User</a>
							</div>
					<div class="box-body">
						<?php $where = 'WHERE `id` != "1"'; if($user->auth == '1'){ $where .=  ' AND `auth` = "2" AND `c_id` = "'.$user->c_id.'"'; }
							$query = $con->query("SELECT * FROM user $where");
    
								if($query->num_rows > 0){ ?>
									<table id="user" class="table table-bordered table-hover table-striped" style="margin-bottom:0px;">
						                <thead>
											<tr>
													
													  <th style="text-align:center;">User Image</th>
													  <th>Username</th>
													  <th>Name</th>
													  <th>Company</th>
														
														<th>Created By</th>
													<?php if($user->auth != '1'){ ?>
														<th>User Type</th>	
													<?php } ?>
													  <th style="text-align:center;">User Status</th>	
													  <th style="text-align:center;">Action</th>		  			  
											</tr>
						                </thead>
										<tbody>
											<?php while($row = $query->fetch_object()){  ?>
												<tr>
													
													<td style="text-align:center;"><img style="width: 50px; " class="img-circle img-bordered-sm online" src="<?php echo $row->image; ?>" alt="user image"></td>
													<td><?php echo $row->user; ?></td>
													<td><?php echo $row->name; ?></td>
													<td><?php echo get_company($con,$row->c_id); ?></td>
													<td><?php $sel = $con->query("SELECT * FROM `user` WHERE `id` = '".$row->created_by."'")->fetch_object(); echo $sel->name; ?></td>
													<?php if($user->auth != '1'){ ?>
														<td><?php if($row->auth == 1){ echo "Admin";}else{ echo "Staff"; } ?></td>
													<?php } ?>
													<td style="text-align:center;"><?php if($row->df == 0){?><a href="process/deactive_user.php?id=<?php echo $row->id; ?>" ><button type="button" onclick="return confirm('Are you sure you want to De Active this User ?');" class="btn btn-success btn-xs">Active</button></a> &nbsp;<?php } ?>
														<?php if($row->df == 1){?><a href="process/active_user.php?id=<?php echo $row->id; ?>"><button type="button" onclick="return confirm('Are you sure you want to Active this User ?');" class="btn btn-danger btn-xs">De Active</button></a><?php } ?></td>
														<td style="text-align:center;">
														<a title="Edit User" class="btn btn-default btn-sm" href="edit_user.php?id=<?php echo $row->id; ?>" style="font-size: 15px;"><i class="fa fa-edit"></i></a> &nbsp;
													</td>			
												</tr>
											<?php } ?>
										</tbody>
									</table>
						<?php 	}else{ ?>
									<div class="box-header with-border">
										<h3 style="text-align:center; margin:0;">No Data Found</h3>
									</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
    </section>


</div>
<script>
	$(function () {   
    	$('#user').DataTable()
	})
</script>
<?php include_once('footer.php'); ?>