<?php include_once('header.php'); ?>
<?php include_once('sidebar.php'); ?>
<title><?= company ?> | Manage Source</title>

<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Manage Source
		</h1>
		<ol class="breadcrumb">
			<li class=""><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
	        <li class="active"> Manage Source</li>
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
		<form action="process/add_source.php" method="post" id="submit" enctype="multipart/form-data">
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-body">
						<div class="box-header with-border">
							<h3 class="box-title">Add Source</h3>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Source *</label>
								<input type="text" id="unit" onkeyup="unit_check()" class="form-control" name="name" autocomplete="off" spellcheck="false" placeholder="Source" required>
								<b><p style="color:red; padding-left: 5px;" id="error_unit"></p></b>
								<input type="hidden" id="hid" />
							</div>
						</div>
					</div>
					<div class="box-body">
						<div class="box-footer">
							<button type="submit" name="submit" class="btn btn-primary pull-right">Add</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<?php $unit = $con->query("SELECT * FROM `source`"); ?>
			<div class="col-md-6">
				<div class="box">
				<div class="box-body">
					<table id="example2" class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>S r no.</th> 
								<th>Source</th> 
								<!--<th></th>--> 
							</tr>
						</thead>
						<tbody>
							
							<?php $count = 0; while($r_unit = $unit->fetch_object()){ $count++; ?>
								<tr>
								
									<td><?php echo $count; ?></td>
									<td><?php echo $r_unit->name; ?></td>
									<!--<td style="text-align:center;"><a href="process/active_source.php?a_id=<?php echo $r_unit->id; ?>" ><button type="button" onclick="return confirm('Are you sure you want to Delete this ?');" class="btn btn-danger btn-xs">Delete</button></a></td>			-->
								</tr>
							<?php } ?>
						</tbody>
              </table>
				</div>
			</div>
			</div>
		</div>
				
		
    </section>
</div>
<script>

function unit_check(){
		var unit = $('#unit').val();
		$.ajax({
			type: 'POST',
			url: 'search/source_check.php',
			data: 'unit='+unit,
			success: function (html) {
				if( html == 'true' )
				{
					$('#hid').val('1');
					$('#error_unit').fadeIn();
					
					$('#error_unit').html('Source Already Exists');
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
			$('#unit').focus();
			return false;
		}
		else
		{
			return true;
		}
	});
	$(function () {   
    $('#example2').DataTable()
})
});
</script>
<?php include_once('footer.php'); ?>