<?php include_once('header.php'); ?>
<?php include_once('sidebar.php'); ?>
<title><?= company ?> | Edit Lead </title>
<div class="content-wrapper">
    <?php

	if( !isset($_GET['id']) || empty($_GET['id']))
	{
		echo "<script>window.location='manage_lead.php';</script>";
		exit;
	}
	?>
    <section class="content-header">
		<h1>
			Edit/View Lead
		</h1>
		<ol class="breadcrumb">
			<li class=""><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
	        <li class="active"><a href="manage_lead.php"><i class="fa fa-list"></i> Manage Lead</a></li>
	        <li class="active">Edit Lead</li>
      	</ol>
    </section>
<?php
$edit_lead = $con->query("select * from lead_master where id = '".$_GET['id']."'")->fetch_object();
$edit_lead_detail = $con->query("select * from lead_company_detail where id = '".$_GET['id']."'")->fetch_object();
?>
<form action="process/edit_lead.php" method="post" id="submit" enctype="multipart/form-data">
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
		<input type="hidden" name="Company" value="<?php echo $edit_lead->company; ?>">
        <div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-body">
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-2">
									<div class="form-group">
										<label for="id">Lead ID</label>
										<input type="text" class="form-control" id="id" name="" value="<?php echo $edit_lead->serial; ?>" autocomplete="off" spellcheck="false" placeholder="ID" readonly>
										<input type="hidden" name="lead_id" value="<?php echo $edit_lead->id; ?>">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="date">Date *</label>
										<input type="text" class="form-control" id="date" name="date" value="<?php echo date("d/m/Y", strtotime($edit_lead->date)); ?>" autocomplete="off" spellcheck="false" placeholder="Date" readonly>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="Status">Status *</label>
										<select name="Status" id="Status" class="form-control" required>
											<option value="">-- Status --</option>
											<?php while($statusr = $status->fetch_object()){ ?>
												<option value="<?php echo $statusr->id; ?>" <?php if($statusr->id == $edit_lead->status){ echo "selected"; } ?>><?php echo $statusr->name; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="Source">Source *</label>
										<select name="Source" id="Source" class="form-control" required>
											<option value="">-- Source --</option>
											<?php while($sourcer = $source->fetch_object()){ ?>
												<option value="<?php echo $sourcer->id; ?>" <?php if($sourcer->id == $edit_lead->source){ echo "selected"; } ?>><?php echo $sourcer->name; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="user">Assigned For *</label>
										<select class="form-control" name="User[]" id="user" data-placeholder="Select a User" required>
											<option value="">-- Assigned For --</option>
											<?php while($company_users = $company_user->fetch_object()){ ?>
												<option value="<?php echo $company_users->id; ?>" <?php if($company_users->id == $edit_lead->assign_for){ echo "selected"; } ?>><?php echo $company_users->name; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="Priority">Priority *</label>
										<select name="Priority" id="Priority" class="form-control" required>
											<option value="">-- Priority --</option>
											<option value="High" <?php if($edit_lead->priority == 'High'){ echo "selected"; } ?>>High</option>
											<option value="Medium" <?php if($edit_lead->priority == 'Medium'){ echo "selected"; } ?>>Medium</option>
											<option value="Low" <?php if($edit_lead->priority == 'Low'){ echo "selected"; } ?>>Low</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="Name">Company *</label>
										<input type="text" id="Name" maxlength="200" class="form-control" value="<?php echo $edit_lead_detail->name; ?>" name="Name" autocomplete="off" spellcheck="false" placeholder="Company" required>
									</div>
								</div>
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-4">
									<div class="form-group">
										<label for="email">Email *</label>
										<input type="email" id="email" value="<?php echo $edit_lead_detail->email; ?>" class="form-control" maxlength="200" name="email" autocomplete="off" spellcheck="false" placeholder="Email" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="Website">Website</label>
										<input type="text" id="Website" class="form-control" value="<?php echo $edit_lead_detail->website; ?>" maxlength="200" name="Website" autocomplete="off" spellcheck="false" placeholder="Website" >
									</div>
								</div>
						
								<div class="col-md-4">
									<div class="form-group">
										<label for="Address">Address</label>
										<textarea type="text" id="Address" class="form-control" name="Address" autocomplete="off" spellcheck="false" placeholder="Address" ><?php echo $edit_lead_detail->address; ?></textarea>
									</div>
								</div>
							</div>
						</div>	
								<div class="col-md-4">
									<div class="form-group">
										<label for="Country">Country *</label>
										<select name="Country" id="Country" class="form-control" multiple="multiple" required>
											<option value="">-- Country --</option>
											<?php while($countries = $country->fetch_object()){ ?>
												<option value="<?php echo $countries->id; ?>" <?php if($countries->id == $edit_lead_detail->country){ echo "selected"; } ?>><?php echo $countries->country_name; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="State">State</label>
										<input type="text" id="State" maxlength="200" class="form-control" value="<?php echo $edit_lead_detail->state; ?>" name="State" autocomplete="off" spellcheck="false" placeholder="State" >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="City">City</label>
										<input type="text" id="City" maxlength="200" value="<?php echo $edit_lead_detail->city; ?>" class="form-control" name="City" autocomplete="off" spellcheck="false" placeholder="City" >
									</div>
								</div>
								
							

								
								<div class="col-md-4">
									<div class="form-group">
										<label for="Contact">Contact Person</label>
										<input type="text" id="Contact" class="form-control" value="<?php echo $edit_lead_detail->c_person; ?>" maxlength="200" name="Contact" autocomplete="off" spellcheck="false" placeholder="Contact Person" >
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="mobile">Mobile *</label>
										<input type="text" id="mobile" class="form-control" value="<?php echo $edit_lead_detail->mobile; ?>" onkeyup="Validate()" name="mobile" autocomplete="off" spellcheck="false" placeholder="Mobile" required>
										 <span id="m1_erorr" style="color: Red; display: none">*Please Enter Valid Mobile Number.</span>
										 <input type="hidden" name="" id="mobile_flag" value="0">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="mobile2">Mobile 2</label>
										<input type="text" id="mobile2" class="form-control" value="<?php echo $edit_lead_detail->mobile2; ?>" onkeyup="Validate2()" name="mobile2" autocomplete="off" spellcheck="false" placeholder="Mobile 2" >
										<span id="m2_erorr" style="color: Red; display: none">*Please Enter Valid Mobile Number.</span>
										<input type="hidden" name="" id="mobile_flag2" value="0">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="cdate">Follow Up Date *</label>
										<input type="text" class="form-control" id="cdate" name="cdate" value="<?php echo date("d/m/Y", strtotime($edit_lead->contact_date)); ?>" autocomplete="off" spellcheck="false" placeholder="Contact Date" readonly>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="Description">Description</label>
										<textarea type="text" id="Description" rows="8" class="form-control" name="Description" autocomplete="off" spellcheck="false" placeholder="Description" ><?php echo $edit_lead_detail->description; ?></textarea>
									</div>
								</div>
							</div>
						</div>	
					</div>
					<div class="box-body">
						<div class="box-footer">
							<?php if($user->auth != 0){ ?><button type="submit" name="submit" class="btn btn-primary pull-right">Save</button><?php } ?>
							<a href="manage_lead.php" onclick="self.close()" class="btn btn-default">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
</form>
					
</div>
<script type="text/javascript">
        function Validate() {
            var isValid = false;
            var regex = /^[0-9-+()]*$/;
            isValid = regex.test(document.getElementById("mobile").value);
            if(!isValid)
            {
            	$('#m1_erorr').fadeIn();
            	$('#mobile').focus();
            	$('#mobile_flag').val('1');
            }
            else
            {
            	$('#m1_erorr').fadeOut();
            	$('#mobile_flag').val('0');
            }
        }
        function Validate2() {
            var isValid = false;
            var regex = /^[0-9-+()]*$/;
            isValid = regex.test(document.getElementById("mobile2").value);
            if(!isValid)
            {
            	$('#m2_erorr').fadeIn();
            	$('#mobile2').focus();
            	$('#mobile_flag2').val('1');
            }
            else
            {
            	$('#m2_erorr').fadeOut();
            	$('#mobile_flag2').val('0');
            }
        }

        
    </script>
<script> 
	$(function(){
		$('#submit').submit(function(){
			if($('#mobile_flag').val() == 1)
        	{
        		$('#mobile').focus();
        		return false;	
        	}
			else if($('#mobile_flag2').val() == 1)
        	{
        		$('#mobile2').focus();
        		return false;
        	}
        	else
        	{
        		return true;
        	}
		});
		var dateToday = new Date();
		

		$( "#State" ).autocomplete({
				  source: 'search/state_search.php'
			});


		$('#Country').select2();
		$('select[name*="Country"]').removeAttr('multiple');
		$('#user').removeAttr('multiple');
		$('#cdate').datepicker({
			autoclose: true,
			format: 'dd/mm/yyyy',
			todayHighlight: true,	
			'startDate': dateToday
		});
		
		
		$('#date').datepicker({
			autoclose: true,
			format: 'dd/mm/yyyy',
			todayHighlight: true
		});
		
		
		$('#Company').change(function(){
			var company = $(this).val();
			var key;
			if(company != ''){
				$.ajax({
					type: 'POST',
					url: 'search/user_select.php',
					data:'company='+company,
					dataType:'json',
					success: function (html) {
							$('#user').empty();
							$.each(html, function(k, v) {
								$('#user').append(v);
							}); 
					}
				});
			}
			else
			{
				$('#user').empty();
			}
		});
	});
</script>

<?php include_once('footer.php'); ?>