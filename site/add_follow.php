<?php include_once('header.php'); ?>
<?php include_once('sidebar.php'); ?>
<title><?= company ?> | FollowUp Details</title>

<?php 
$check_row = $con->query("SELECT * FROM `lead_master` WHERE `id` = '".$_GET['id']."'");
if(!isset($_GET['id']) || empty($_GET['id']))
{
	echo "<script>window.location='index.php';</script>";
	exit;
}
else if($check_row->num_rows == 0)
{
	echo "<script>window.location='index.php';</script>";
	exit;
}
 ?>
<div class="content-wrapper">
	<style>
/* The add_container */
.add_container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.add_container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
}

/* On mouse-over, add a grey background color */
.add_container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.add_container input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.add_container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.add_container .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
</style>

    <?php if(!isset($_GET['type'])){ $_GET['type'] = 01; } ?>
	<section class="content-header">
		<h1>
			FollowUp Details
		</h1>
	
		<ol class="breadcrumb">
	        <li class=""><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
	        <li class=""><a href="followup.php?id=<?php echo $_GET['type']; ?>"><i class="fa fa-comment"></i>Followups</a></li>
	        <li class="active"><i class="fa fa-comment"></i> Add FollowUp</li>
      	</ol>
    </section>
    <style type="text/css">
    	dt
    	{
    		text-align: left !important;
    	}
    </style>


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
		<?php 
		$follow = $con->query("SELECT * FROM `lead_master` WHERE `id` = '".$_GET['id']."'")->fetch_object(); 
		$com_detail = $con->query("SELECT * FROM `lead_company_detail` WHERE `id` = '".$follow->id."'")->fetch_object();
		$country = $con->query("SELECT * FROM `apps_countries` WHERE `id` = '".$com_detail->country."'")->fetch_object();
		$last_note_date = $con->query("SELECT * FROM `notes` WHERE `l_id` = '".$follow->id."' ORDER BY `id` DESC LIMIT 1");
		?>

		<div class="row">
			<div class="col-md-12">
	          <div class="box box-solid">
	            <div class="box-header with-border" style="border-bottom: solid 2px #e6e7e8;">
	              <h3 class="box-title"><?php echo $com_detail->name.' - '.$com_detail->c_person; ?></h3>
	              <a href="edit_lead_new.php?id=<?php echo $_GET['id']; ?>&type=<?php echo $_GET['type']; ?>" class="btn btn-success btn-sm pull-right">Edit</a>
	              		<?php if($follow->assign_for == 0){ ?> 	
	              			<div class="col-md-3 pull-right">
				              <select id="assign_user" name="" class="form-control" onchange="asssign();">
				              	<option value="" >-- Select To Transfer This Lead--</option>
				             	<?php while($company_user23 = $company_user2->fetch_object()){ ?>
				             		<option value="<?php echo $company_user23->id; ?>" ><?php echo $company_user23->name; ?></option>
				             	<?php } ?>
				              </select>
			             	</div>
			             	<?php if($follow->source == '4'){ $fid = '4'; }else{ $fid = '3'; } ?>
			             	<a href="process/delete_india.php?id=<?php echo $_GET['id']; ?>&f_id=<?php echo $fid; ?>" onclick="return confirm('Are you sure you want to Delete this Lead ?');" class="btn btn-danger btn-sm pull-right">Delete</a>
	              			<?php } ?>
		              		<?php if($user->auth == 1){ if($follow->close == '2'){ ?>
		              			<a href="process/delete_not_related.php?id=<?php echo $_GET['id']; ?>&use=<?php echo $follow->assign_for; ?>" onclick="return confirm('Are you sure you want to Delete this Lead ?');" class="btn btn-danger btn-sm pull-right">Delete</a>
		              		<?php } } ?>
	            </div>
	            <div class="row">
	            <div class="col-md-12">
		            <div class="box-body" >
		           		<div class="col-md-4" style="border-right: solid 2px #e6e7e8; ">
			              
			              	<h4 style="    font-weight: 600;">Company Detail</h4>
			               
			                
			               <table>
			               	<tr> 
				                <th>Email</th>
				                <td>&nbsp;&nbsp;</td>
				                <td><p style="max-withh: 275px; word-wrap:break-word; margin: 0px;"><?php echo $com_detail->email; ?></p></td>
			                </tr>
			                <tr>
				                <th>Mobile</th>
				                <td>&nbsp;&nbsp;</td>
				                <td><p style="max-withh: 275px; word-wrap:break-word; margin: 0px;"><?php echo $com_detail->mobile; ?></p></td>
			               	</tr>
			               	<?php if(!empty($com_detail->mobile2)){ ?>
			               		<tr>
					                <th>Mobile 2</th>
					                <td>&nbsp;&nbsp;</td>
					                <td><p style="max-withh: 275px; word-wrap:break-word; margin: 0px;"><?php echo $com_detail->mobile2; ?></p></td>
			               		</tr>
			               	<?php } ?>
			               	<tr>
				                <th>Country</th>
				                <td>&nbsp;&nbsp;</td>
				                <td><p style="max-withh: 275px; word-wrap:break-word; margin: 0px;"><?php echo $country->country_name; ?></p></td>
			                </tr>
			                <tr>
				                <th>State</th>
				                <td>&nbsp;&nbsp;</td>
				                <td><p style="max-withh: 275px; word-wrap:break-word; margin: 0px;"><?php echo $com_detail->state; ?></p></td>
			                </tr>
			                <tr>
				                <th>City</th>
				                <td>&nbsp;&nbsp;</td>
				                <td><p style="max-withh: 275px; word-wrap:break-word; margin: 0px;"><?php echo $com_detail->city; ?></p></td>
			               </tr>
			               <tr>
				                <th>Source</th>
				                <td>&nbsp;&nbsp;</td>
				                <td><p style="max-withh: 275px; word-wrap:break-word; margin: 0px;"><?php echo get_source($con,$follow->source); ?></p></td>
			               </tr>
			               </table>
		            	</div>

		            	<div class="col-md-4" style="border-right: solid 2px #e6e7e8; ">
			              
			              	<h4 style="font-weight: 600;">Lead Detail</h4>

			            <table>
			               	<tr>
				              	<th>Lead Id</th>
				              	<td>&nbsp;&nbsp;</td>
				                <td><p style="max-withh: 275px; word-wrap:break-word; margin: 0px;"><?php echo $follow->serial; ?></p></td>
				            </tr>
			              	<?php if($user->auth == 1){ ?>
			              		<?php if($follow->assign_for != 0){ ?>
				              	<tr>
					                <th>Lead Owner</th>
					                <td>&nbsp;&nbsp;</td>
					                <td><p style="max-withh: 275px; word-wrap:break-word; margin: 0px;"><?php echo get_user($con,$follow->assign_for); ?></p></td>
				            	</tr>
			            		<?php } ?>
			            	<?php } ?>
			               
			               	<tr>
				                <th>Lead Status</th>
				                <td>&nbsp;&nbsp;</td>
				                <td><p style="max-withh: 275px; word-wrap:break-word; margin: 0px;"><?php echo status_lead($follow->close); ?></p></td>
			            	</tr>
			            	<tr>
				                <th>Last Followup Date</th>
				                <td>&nbsp;&nbsp;</td>
			                	<?php if($last_note_date->num_rows > 0){ 

			                		$last_note_dater = $last_note_date->fetch_object(); ?>

			                	<td><p style="max-withh: 275px; word-wrap:break-word; margin: 0px;"><?php echo date("d/m/Y", strtotime($last_note_dater->l_date)); ?></p></td>
			            		<?php }else{ ?>
			            			<td>No FollowUp</td>
			            		<?php } ?>
			            	<tr>
			                 	<th>Next Followup Date</th>
			                 	<td>&nbsp;&nbsp;</td>
			                	<td><p style="max-withh: 275px; word-wrap:break-word; margin: 0px;"><?php echo date("d/m/Y", strtotime($follow->contact_date)); ?></p></td>
			                </tr>
			                <tr>
			                	<th>Customer</th>
			                	<td>&nbsp;&nbsp;</td>
			                	<td><p style="max-withh: 275px; word-wrap:break-word; margin: 0px;"><?php if($follow->customer){ echo 'Yes'; }else{ echo 'No'; }; ?></p></td>
			                </tr>
			              </table>
		            	</div>

		            	<div class="col-md-4" >
		            		<h4 style="    font-weight: 600;">Description</h4>
			              <dl class="" style="max-height: 120px; overflow-y: scroll;">
			                
			                <p><?php echo nl2br($com_detail->description); ?></p>
			                
			              </dl>
		            	</div>
		        	</div>
		       		 </div>
		        </div>
		        <div class="row" >
		        	<div class="col-md-12">
		        		<div class="col-md-6" >
		        			<div class="box-body" >
		        				<div class="box-header with-border" style="border-top: solid 2px #e6e7e8; border-bottom: solid 2px #e6e7e8;">
					              <h3 class="box-title">Note's</h3>
					            </div>
					            <?php $note = $con->query("SELECT * FROM `notes` WHERE `l_id` = '".$_GET['id']."' ORDER BY `id` DESC");
					            if($note->num_rows){
					             ?>
					             <div class="tab-content" style="max-height:430px; overflow-y: scroll;">
					             <?php $sr = 0; while($notes = $note->fetch_object()){ $sr++; ?>
					       		
					       		<div class="post">
					             	<div class="user-block">
					                    <img class="img-circle img-bordered-sm" src="<?php echo get_user_data($con,$notes->f_by)->image; ?>" alt="user image">
					                        <span class="username" id="span_<?php echo $notes->id; ?>" ondblclick="change(this.id);" title="Dubble Click To Edit Description">
					                          <?php echo nl2br($notes->descr); ?>
					                        </span>
					                        <textarea cols="60" rows="7" id="descr_<?php echo $notes->id; ?>" onblur="save(this.id)" style="display: none;"><?php echo $notes->descr; ?></textarea>
					                    <span class="description"><i class="fa fa-clock-o"></i> <?php echo date("h:i A", strtotime($notes->f_time)).'-'.date("d/m/Y", strtotime($notes->l_date)).' - '.get_follow_type($notes->f_type).' - '.get_user($con,$notes->f_by); ?></span>
					                </div>
					            </div>
					            

					            <?php } ?>
					            </div>
						        <?php }else{ ?>
						        		<div class="box-header with-border">
												<h3 style="text-align:center; margin:0;">No Notes Found</h3>
											</div>
						        <?php } ?>
		        			</div>
		        		</div>
		        		<div class="col-md-6" >
		        		<form action="process/add_note_old.php" method="post" id="submit" enctype="multipart/form-data">
		        			<input type="hidden" name="TYPE" value="<?php echo $_GET['type']; ?>">
		        			<input type="hidden" name="lead_id_send" value="<?php echo trim($_GET['id']); ?>">
		        			<div class="box-body">
		        			<div class="box-header with-border" style="border-top: solid 2px #e6e7e8; border-bottom: solid 2px #e6e7e8;">
				              <h3 class="box-title">FollowUp Note</h3>
				            </div>
		        			<div class="col-md-6">
								<div class="form-group">
									<label for="id">Lead ID</label>
									<input type="text" class="form-control" name="lead_id" value="<?php echo $follow->serial; ?>" readonly>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="date">FollowUp Date</label>
									<input type="text" class="form-control" id="date" name="date" value="<?php echo date("d/m/Y"); ?>" autocomplete="off" spellcheck="false" placeholder="Date" readonly>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="time">FollowUp Time</label>
									<input type="text" class="form-control" id="time" name="time" value="<?php echo date("h:i A"); ?>" autocomplete="off" spellcheck="false" placeholder="time" readonly>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="ftype">Followup Type *</label>
									<select name="ftype" id="ftype" class="form-control" required>
										<option value="">-- Followup Type --</option>
										<?php while($ftyper = $ftype->fetch_object()){ ?>
											<option value="<?php echo $ftyper->id; ?>"><?php echo $ftyper->name; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="ndate">Next FollowUp Date *</label>
									<input type="text" class="form-control" id="ndate" name="ndate" autocomplete="off" spellcheck="false" placeholder="Next FollowUp Date" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="close">Status *</label>
									<select id="close" name="close" class="form-control" required>
						              	<option value="">-- Select Status --</option>
						              	<option value="0" selected>Open</option>
						              	<option value="1">Closer</option>
						              	<option value="2">Not Related</option>
						              	
					              	</select>
					              </div>
							</div>
							<div class="col-md-4">
								<label class="add_container">
									Customer
				                  <input type="checkbox" class="minimal" name="customer" value="1" <?php if($follow->customer){ echo 'checked'; }; ?>>
				                  <span class="checkmark"></span>
				                </label>
							</div>
							<div class="col-md-12">
								<label for="ndate">Description *</label>
								<textarea class="form-control" name="descr" rows="7" required></textarea>
							</div>
							
		        		</div>
		        		<div class="box-body">
		        			<div class="col-md-12">
								<button type="submit" name="submit" class="btn btn-primary pull-right">Add</button>
								<a href="<?php if ($follow->assign_for != 0) {
									echo "followup.php?id=".$_GET['type'];
								}else if($follow->source == 3){ echo "import_transfer.php?id=3"; }else{ echo "import_transfer.php?id=4"; } ?>"   class="btn btn-default" onclick="self.close()">Cancel</a>
							</div>
						</div>
						<input type="hidden" id="id_lead" value="<?php echo $_GET['id']; ?>">
					</form>
		        	</div>
		        	</div>
		        </div>
	          </div>
	        </div>
		</div>
		
    </section>

<script type="text/javascript">
	var dateToday = new Date();
	$(function(){
		$('#ndate').datepicker({
			autoclose: true,
			format: 'dd/mm/yyyy',
			todayHighlight: true,
			'startDate': dateToday
		});
		$("#ndate").keydown(function(e){
       		 e.preventDefault();
   		 });


	});

	function change(id)
	{
		id = id.replace('span_', '');
		$('#span_'+id).hide();
		$('#descr_'+id).show();
	}

	function save(id)
	{
		id = id.replace('descr_', '');
		type = $('#descr_'+id).val();
		$.ajax({
        type: 'POST',
        url: 'process/edit_notes.php',
        data:'type='+type+'&id='+id,
        success: function (html) {
			window.location.reload();
        }
   		});
	}

	function asssign()
	{
		var user = $('#assign_user').val();
		var id = $('#id_lead').val();
		$.ajax({
	        type: 'POST',
	        url: 'process/assign_user.php',
	        data:'user='+user+'&id='+id,
	        success: function (html) {
				window.close();
	        }
   		});
	}
</script>

	
</div>
<?php include_once('footer.php'); ?>