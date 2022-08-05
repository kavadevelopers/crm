<?php include_once('header.php'); ?>
<?php include_once('sidebar.php');  ?>
<title><?= company ?> | Manage Company</title>
<?php
if( $user->auth != 0 )
{
	echo "<script>window.location='index.php';</script>";
	exit;
}
?>
<div class="content-wrapper">
    
    <section class="content-header">
		<h1>
			Manage Company
		</h1>
		<ol class="breadcrumb">
			<li class=""><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
	        <li class="active"><i class="fa fa-industry"></i> Manage Company</li>
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
        
		<div class="row">
			<div class="col-md-12">
				<div class="box">
				<div class="box-header">
	              <h3 class="box-title">Companies</h3>
	              <a href="add_company_new.php" class="btn btn-success pull-right btn-sm">Add Company</a>
	            </div>
				<div class="box-body" style="overflow-x: scroll;">
					<?php $query = $con->query("SELECT * FROM company");
						if($query->num_rows > 0){ ?>
							<table id="example2" class="table table-bordered table-hover table-striped" style="margin-bottom:0px;">
				                <thead>
									<tr>
											
											  <th>Name</th>
											  <th>Email</th>
											  <th>Mobile</th>		  			  
											  <th>Company Ip</th>		  			  
											  <th style="text-align:center;">Status</th>	
											  <th style="text-align:center;">Action</th>	  			  
									</tr>
				                </thead>
								<tbody>
									<?php while($row = $query->fetch_object()){  ?>
										<tr>
											
											<td><?php echo $row->name; ?></td>
											<td><?php echo $row->email; ?></td>
											<td><?php echo $row->mobile; ?></td>
											<td><?php echo $row->ip; ?></td>
											
											
											
											<td style="text-align:center;">
												<?php if($row->df == 0){?><a href="process/delete_company.php?d_id=<?php echo $row->id; ?>" ><button type="button" onclick="return confirm('Are you sure you want to De Active this Company ?');" 	class="btn btn-success btn-xs">Active</button></a> &nbsp;<?php } ?>
								<?php if($row->df == 1){?><a href="process/delete_company.php?a_id=<?php echo $row->id; ?>"><button type="button" onclick="return confirm('Are you sure you want to Active this Company ?');" class="btn btn-danger btn-xs">De Active</button></a><?php } ?>
											</td>	
											<td style="text-align:center;">
												<a href="edit_company.php?id=<?php echo $row->id; ?>" class="btn btn-default btn-sm" title="Edit Or View" style="font-size: 15px;"><i class="fa fa-edit"></i></a>
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
    $('#example2').DataTable()
})
</script>

<?php include_once('footer.php'); ?>