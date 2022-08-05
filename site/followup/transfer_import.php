							<?php
								include_once("../config/config.php");
								include_once("../function/other.php");
								include_once("../query.php");
								?>
							<table id="followup" class="table table-hover table-striped">
			              	<thead>
				                <tr>
				                	<th><label class="add_container">
									Check All
				                  <input type="checkbox" class="minimal" id="checkedAll" value="" >
				                  <span class="checkmark"></span>
				                </label></th>
				                	<th>View</th>
				                	<th>Lead Id</th>
				                  	<th>Due Date</th>
				                  	<th>Contact Name</th>
				                  	<th>Company Name</th>
				                  	<th>Status</th>
				                  	<th>Action</th>
				                  	
				                  	
				                  	

				                </tr>
			                </thead>
			                <tbody >
								<?php 
								
								$follow = $con->query("SELECT * FROM `lead_master` WHERE `assign_for` = '0' AND `source` = '".$_POST['type']."' AND `company` = '".$user->c_id."' "); 
								while($followr = $follow->fetch_object()){  $com_detail = $con->query("SELECT * FROM `lead_company_detail` WHERE `id` = '".$followr->id."'")->fetch_object(); $user_for_lead = $con->query("SELECT * FROM `user` WHERE `id` = '".$followr->assign_for."'")->fetch_object();?>
				                	
					                <tr title="<?php if(!empty($com_detail->description)){ echo "Description : ".strip_tags($com_detail->description,'<br>'); } ?>">
					                  
					                	<td>
					                		<label class="add_container">
				                  			<input type="checkbox" name="array[]" class="minimal checkSingle delete_checkbox" value="<?php echo $followr->id; ?>" >
				                 			 <span class="checkmark"></span>
				               				 </label>
				               				
				           				 </td>
				           				 <td> <a href="add_follow.php?id=<?php echo $followr->id; ?>" target="_blank" class="btn btn-default btn-xs" title="View Lead">View</a></td>
					                  <td><?php echo $followr->serial.'&nbsp;&nbsp;&nbsp; '; if( $followr->customer == 1 ){ echo ' <span class="btn btn-primary btn-xs"><i class="fa fa-user-plus" aria-hidden="true"></i></span>'; } ?></td>


					                  <td><?php echo date("d/m/Y", strtotime($followr->contact_date)); ?></td>

					                  <td><?php if(!empty($com_detail->c_person)) {echo strip_tags($com_detail->c_person,'<br>'); }else{ echo ' - '; } ?></td>
					                   <td><?php echo strip_tags($com_detail->name,'<br>'); ?></td>	
					                  <td><?php echo status_lead($followr->close); ?></td>	
					                  <td>
										<!--<a href="process/delete_india.php?id=<?php echo $followr->id; ?>&f_id=<?php echo $_POST['type']; ?>" class="btn btn-danger btn-sm" title="Delete" style="font-size: 15px;" onclick="return confirm('Are you sure you want to Delete this Lead ?');"><i class="fa fa-times"></i></a>-->
										</td>
					                 	
					                  
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
						      if(isAllChecked == 0){ $("#checkedAll").prop("checked", true); }     
						    }else {
						      $("#checkedAll").prop("checked", false);
						    }
						  });
						});
						</script>