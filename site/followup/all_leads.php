<?php
								include_once("../config/config.php");
								include_once("../function/other.php");
								include_once("../query.php");
								?>
<?php $where = ''; $where .= ' where `company` = "'.$user->c_id.'" AND `assign_for` != "0"'; if($user->auth == 2){ $where .= ' AND `assign_for` = "'.$user->id.'"'; }
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
						 $query = $con->query("SELECT * FROM lead_master $where");
						 
    
								if($query->num_rows > 0){ ?>
									<table id="lead" class="table table-bordered table-hover table-striped" style="margin-bottom:0px;">
						                <thead>
											<tr>
													
													  <th>Lead Id</th>
													  <th>Date</th>
													  <th>Company</th>
													  <th>Follow Up Date</th>
														<th >Address</th>
													  <th >Status</th>
													  <th style="display: none;">Email</th>
													  <th style="display: none;">Mobile</th>
													  <th style="display: none;">Mobile2</th>
													  <th style="display: none;">Address</th>
													  <th style="display: none;">City</th>
													  <th style="display: none;">State</th>
													  <th style="display: none;">Country</th>
													  <th style="display: none;">Contact Person</th>
													  <?php if($user->auth == 1){ ?>
													  	<th >Assigned For</th>
													  <?php } ?>	
													  <th style="text-align:center;">Priority</th>
													  <th style="text-align:center;">Action</th>

											</tr>
						                </thead>
										<tbody>
											<?php while($row = $query->fetch_object()){  ?>
												<?php $company = $con->query("SELECT * FROM `lead_company_detail` WHERE `id` ='".$row->id."'")->fetch_object(); 
												$user_for_lead = $con->query("SELECT * FROM `user` WHERE `id` = '".$row->assign_for."'")->fetch_object(); ?>
												<tr title="<?php if(!empty($company->description)){ ?> discription : <?php echo strip_tags($company->description,'<br>'); } ?>">
													
													<td><?php echo $row->serial.'&nbsp;&nbsp;&nbsp; '; if( $row->customer == 1 ){ echo ' <span class="btn btn-primary btn-xs"><i class="fa fa-user-plus" aria-hidden="true"></i></span>'; } ?></td>
													<td><?php echo date("d/m/Y", strtotime($row->date)); ?></td>
													<td><?php echo strip_tags($company->name,'<br>'); ?></td>
													<td style="width:50px;"><?php echo date("d/m/Y", strtotime($row->contact_date)); ?></td>
													
													<td><?= $row->address ?></td>
													<td><?php echo get_status($con,$row->status); ?></td>
													<td style="display: none;"><?php echo $company->email; ?></td>
													<td style="display: none;"><?php echo $company->mobile; ?></td>
													<td style="display: none;"><?php echo $company->mobile2; ?></td>
													<td style="display: none;"><?php echo $company->address; ?></td>
													<td style="display: none;"><?php echo $company->city; ?></td>
													<td style="display: none;"><?php echo $company->state; ?></td>
													<td style="display: none;"><?php echo get_country($con,$company->country); ?></td>
													<td style="display: none;"><?php echo $company->c_person; ?></td>

													 <?php if($user->auth == 1){ ?>
													 	<td><?php echo $user_for_lead->name; ?></td>
													  <?php } ?>
													  <td style="text-align:center;"><?php echo priority($row->priority); ?></td>
													<td style="text-align:center;">
														<a href="edit_lead.php?id=<?php echo $row->id; ?>" target="_blank" class="btn btn-primary btn-sm" title="Edit Or View" style="font-size: 15px;"><i class="fa fa-edit"></i></a>
														 <a class="btn btn-default btn-sm" target="_blank" href="add_follow_with_lead.php?id=<?php echo $row->id; ?>" title="View Lead">View</a>
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

						<script>
	$(function () {   
    	$('#lead').DataTable({
    			dom: 'lBfrtip',
		        buttons: [
		            'excel', 'pdf', 'print'
		        ]
    	})

	})
</script>