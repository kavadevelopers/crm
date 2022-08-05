								<form action="process/delete_all_lead_user_wise.php?id=<?php echo $_POST['user']; ?>" method="post">
								<?php
								include_once("../config/config.php");
								include_once("../function/other.php");
								include_once("../query.php");
								?>
								<?php if($_POST['type'] == 3){ ?><button class="btn btn-danger btn-xs pull-right" onclick="return confirm('Are you sure you want to Delete Checked Leads ?');">Delete Checked</button><?php } ?>
							<table id="followup" class="table table-hover table-striped">
			              	<thead>
				                <tr>
				                	<?php if($_POST['type'] == 3 && $user->auth != 2){ ?>
				                	<th><label class="add_container">
										Check All
					                  <input type="checkbox" class="minimal" id="checkedAll" value="" >
					                  <span class="checkmark"></span>
					                </label></th>
				                	<th>View</th>
				            		<?php } ?>
				                	<th>Lead Id</th>
				                  	<th>Due Date</th>
				                  	<th>Contact Name</th>
				                  	<th>Company Name</th>
				                  	<th>Source</th>
				                  	<th>Country</th>
				                  	<th>State</th>
				                  	<th>City</th>
				                  	<th>Status</th>
				                  	
				                  	
				                  	<?php if($user->auth == 1){ ?>
				                  		<th>Assign For</th>
				                  		<th></th>
				                  	<?php } ?>
				                  	<th></th>

				                </tr>
			                </thead>
			                <tbody >
								<?php 
								
								$where = " WHERE `company` = '".$user->c_id."' AND `assign_for` != '0'";
								if(!empty($_POST['type']))
								{
									if($_POST['type'] == 'pending')
									{
										$where .= " AND `close` = '0' AND `contact_date` <= '".date('Y-m-d')."'";
									}
									else
									{
										if($_POST['type'] == '4')
										{
											$where .= " AND `customer` = '1'";
										}else
										{
											$status = $_POST['type'] - 1;
											$where .= " AND `close` = '".$status."'";
										}
									}
								}
								
									$where .= " AND `assign_for` = '".$_POST['user']."'";
								
								
								$follow = $con->query("SELECT * FROM `lead_master` $where"); 
								while($followr = $follow->fetch_object()){ 
				                	$com_detail = $con->query("SELECT * FROM `lead_company_detail` WHERE `id` = '".$followr->id."'")->fetch_object(); $user_for_lead = $con->query("SELECT * FROM `user` WHERE `id` = '".$followr->assign_for."'")->fetch_object(); $country = $con->query("SELECT * FROM `apps_countries` WHERE `id` = '".$com_detail->country."'")->fetch_object();?>
					                <tr <?php if($_POST['type'] != 3 || $user->auth != 1){ ?>onclick="window.open('add_follow_user_wise.php?id=<?php echo $followr->id; ?>&type=<?php echo $_POST['typer']; ?>','_blank');" style="cursor: pointer;"<?php } ?> title="<?php if(!empty($com_detail->description)){ echo "Description : ".strip_tags($com_detail->description,'<br>'); } ?>">
					                	<?php if($_POST['type'] == 3 && $user->auth != 2){ ?>
					                	<td id="not_redirect">
					                		<label class="add_container">
				                  			<input type="checkbox" name="array[]" class="minimal checkSingle" value="<?php echo $followr->id; ?>" >
				                 			 <span class="checkmark"></span>
				               				 </label>
				           				 </td>
				           				 <td> <a class="btn btn-default btn-xs" onclick="window.location='add_follow_user_wise.php?id=<?php echo $followr->id; ?>&type=<?php echo $_POST['typer']; ?>';" title="View Lead">View</a></td>
				           				 <?php } ?>
					                  <td><?php echo $followr->serial.'&nbsp;&nbsp;&nbsp; '; if( $followr->customer == 1 ){ echo ' <span class="btn btn-primary btn-xs"><i class="fa fa-user-plus" aria-hidden="true"></i></span>'; } ?></td>	
					                  <td><?php echo date("d/m/Y", strtotime($followr->contact_date)); ?></td>
					                  <td><?php if(!empty($com_detail->c_person)) {echo strip_tags($com_detail->c_person,'<br>'); }else{ echo ' - '; } ?></td>
					                  <td><?php echo strip_tags($com_detail->name,'<br>'); ?></td>	
					                  <td><?php echo get_source($con,$followr->source); ?></td>
					                  <td><?php echo $country->country_name; ?></td>	
					                  <td><?php echo strip_tags($com_detail->state,'<br>'); ?></td>	
					                  <td><?php echo strip_tags($com_detail->city,'<br>'); ?></td>	
					                  <td><?php echo status_lead($followr->close); ?></td>	
					                  <?php if($user->auth == 1){ ?>	
					                  	<td><?php echo $user_for_lead->name; ?></td>
					                  	<?php if($followr->close == 2 ){ ?>
					                  	<td>
										<a href="process/delete_lead.php?id=<?php echo $followr->id; ?>" class="btn btn-danger btn-sm" title="Delete" style="font-size: 15px;" onclick="return confirm('Are you sure you want to Delete this Lead ?');"><i class="fa fa-times"></i></a>
										</td>
									<?php }else{ ?>
										<td></td>
					                  <?php } } ?>	
					                  <td><?php echo $com_detail->mobile ?></td>
					                </tr>
				            	<?php } ?>
				            	</tbody>
			              </table>

			              <script>
						$(function () {   
						    $('#followup').DataTable({
									dom: 'lBfrtip',
						        buttons: [
						            'excel', 'pdf', 'print'
						        ]
						    })
						})
						$(document).ready(function() {
						  $("#checkedAll").change(function(){
						    if(this.checked){
						      $(".checkSingle").each(function(){
						        this.checked=true;
						      })              
						    }else{
						      $(".checkSingle").each(function(){
						        this.checked=false;
						      })              
						    }
						  });

						  $(".checkSingle").click(function () {
						    if ($(this).is(":checked")){
						      var isAllChecked = 0;
						      $(".checkSingle").each(function(){
						        if(!this.checked)
						           isAllChecked = 1;
						      })              
						      if(isAllChecked == 0){ $("#checkedAll").prop("checked", true);  }     
						       
						    }else {
						      $("#checkedAll").prop("checked", false);
						      
						    }
						  });

						});
						</script>
						<style>
/* The add_container */
.add_container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 15px;
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
</form>