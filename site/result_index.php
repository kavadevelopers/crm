<?php 
		include_once('config/config.php');
		include_once('query.php');
		if($user->auth != 0){
		$where = " Where `company` = '".$user->c_id."'";
			if($_POST['type'] != 0)
			{
				$where .= " AND `assign_for` = '".$_POST['type']."'";
			}
			
			
				$where .= " AND `assign_for` != '0'";
			
		$follow = $con->query("SELECT * FROM `lead_master`   $where AND `contact_date` <= '".date('Y-m-d')."' AND `close` = '0'"); 
		$open = $con->query("SELECT * FROM `lead_master`   $where AND `close` = '0'"); 
		$close = $con->query("SELECT * FROM `lead_master`   $where AND `close` = '1'"); 
		$n_related = $con->query("SELECT * FROM `lead_master`   $where AND `close` = '2'"); 
		$customer = $con->query("SELECT * FROM `lead_master`   $where AND `customer` = '1'"); 
		$indiamart = $con->query("SELECT * FROM `lead_master`   Where `company` = '".$user->c_id."' AND `assign_for` = '0' AND `source` = '4'"); 
		$trade_india = $con->query("SELECT * FROM `lead_master`   Where `company` = '".$user->c_id."' AND `assign_for` = '0' AND `source` = '3'"); 
		$total_leads = $con->query("SELECT * FROM `lead_master` $where");
		
		
		?>
			<?php if($user->auth == 2){ ?>
				<div class="col-lg-3 col-xs-6" onclick="window.location='manage_lead.php';" style="cursor: pointer;" title="Leads">
		          <div class="small-box bg-aqua">
		            <div class="inner">
		              <h3><?php echo $total_leads->num_rows; ?></h3>
		              <p>Total Leads</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-list"></i>
		            </div>
		            <span href="" class="small-box-footer">View All<i class="fa fa-arrow-circle-right"></i></span>
		          </div>
		        </div>

		        <div class="col-lg-3 col-xs-6" onclick="window.location='followup.php?id=open';" style="cursor: pointer;" title="Open Leads">
		          <!-- small box -->
		          <div class="small-box bg-green">
		            <div class="inner">
		              <h3><?php echo $open->num_rows; ?></sup></h3>

		              <p>Open Leads</p>
		            </div>
		            <div class="icon">
		              <i class="ion ion-stats-bars"></i>
		            </div>
		            <span class="small-box-footer">View All <i class="fa fa-arrow-circle-right"></i></span>
		          </div>
		        </div>

		        <div class="col-lg-3 col-xs-6" onclick="window.location='followup.php?id=01';" style="cursor: pointer;" title="Pending Followup">
		          <!-- small box -->
		          <div class="small-box bg-yellow">
		            <div class="inner">
		              <h3><?php echo $follow->num_rows; ?></h3>

		              <p>Pending Followup</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-comment"></i>
		            </div>
		            <span href="followup.php?id=01" class="small-box-footer">View All <i class="fa fa-arrow-circle-right"></i></span>
		          </div>
		        </div>

		        <div class="col-lg-3 col-xs-6" onclick="window.location='followup.php?id=2';" style="cursor: pointer;" title="Closure">
		          <!-- small box -->
		          <div class="small-box bg-red">
		            <div class="inner">
		              <h3><?php echo $close->num_rows; ?></h3>

		              <p>Closure</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-trash"></i>
		            </div>
		            <span href="followup.php?id=2" class="small-box-footer">View All <i class="fa fa-arrow-circle-right"></i></span>
		          </div>
		        </div>

		        <div class="col-lg-3 col-xs-6" onclick="window.location='followup.php?id=3';" style="cursor: pointer;" title="Not Raleted">
		          <!-- small box -->
		          <div class="small-box bg-red" style="background-color: #963428 !important;" >
		            <div class="inner">
		              <h3><?php echo $n_related->num_rows; ?></h3>

		              <p>Not Raleted</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-eraser"></i>
		            </div>
		            <a href="followup.php?id=3" class="small-box-footer">View All <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
		        </div>

		        <div class="col-lg-3 col-xs-6" onclick="window.location='followup.php?id=4';" style="cursor: pointer;" title="Customer">
		          <!-- small box -->
		          <div class="small-box bg-red" style="background-color: #769628 !important;">
		            <div class="inner">
		              <h3><?php echo $customer->num_rows; ?></h3>

		              <p>Customer</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-address-card"></i>
		            </div>
		            <span href="followup.php?id=4" class="small-box-footer">View All <i class="fa fa-arrow-circle-right"></i></span>
		          </div>
		        </div>
		        <?php if($user->auth == 1): ?>
		        <div class="col-lg-3 col-xs-6" onclick="window.location='import_transfer.php?id=4';" style="cursor: pointer;" title="Inquiry From IndiaMart">
		          <!-- small box -->
		          <div class="small-box bg-red" style="background-color: #959692 !important;">
		            <div class="inner">
		              <h3><?php echo $indiamart->num_rows; ?></h3>

		              <p>IndiaMart</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-cloud-download"></i>
		            </div>
		            <span href="import_transfer.php?id=4" class="small-box-footer">View All <i class="fa fa-arrow-circle-right"></i></span>
		          </div>
		        </div>

		        <div class="col-lg-3 col-xs-6" onclick="window.location='import_transfer.php?id=3';" style="cursor: pointer;" title="Inquiry From TradeIndia">
		          <!-- small box -->
		          <div class="small-box bg-red" style="background-color: #9e73ce !important;">
		            <div class="inner">
		              <h3><?php echo $trade_india->num_rows; ?></h3>

		              <p>TradeIndia</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-cloud-download"></i>
		            </div>
		            <span href="import_transfer.php?id=3" class="small-box-footer">View All <i class="fa fa-arrow-circle-right"></i></span>
		          </div>
		        </div>
		    <?php endif; ?>

		  <?php }else{ $com_user = $con->query("Select * From `user` Where `c_id` = '".$user->c_id."'"); ?>
		  		<?php
		  			$wherea = " Where `company` = '".$user->c_id."'";
					$wherea .= " AND `assign_for` != '0'";
		  			

		  		?>
				<div class="col-md-8">
					<div class="box">
						<div class="box-body">
			  				<table id="lead" class="table table-bordered table-hover table-striped" style="margin-bottom:0px;">
			  					<thead>
									<tr>
										<th>Users Name</th>
										<th>Total Leads</th>
										<th>Open Leads</th>
										<th>FollowUp's</th>
										<th>Closure</th>
										<th>Not Related</th>
										<th>Customer</th>
									</tr>
								</thead>
								<tbody>
									<?php $total_all_leads = 0; $total_all_follow = 0; $total_all_open = 0; $total_all_close = 0; $total_all_customer = 0; $total_all_n_related = 0;
									while($com_users = $com_user->fetch_object()){
											$total_leads = $con->query("SELECT * FROM `lead_master` $wherea AND `assign_for` = '".$com_users->id."'");
											$open = $con->query("SELECT * FROM `lead_master`   $wherea AND `assign_for` = '".$com_users->id."' AND `close` = '0'"); 
											$follow = $con->query("SELECT * FROM `lead_master`   $wherea AND `assign_for` = '".$com_users->id."' AND `contact_date` <= '".date('Y-m-d')."' AND `close` = '0'"); 
											$close = $con->query("SELECT * FROM `lead_master`   $wherea AND `assign_for` = '".$com_users->id."' AND `close` = '1'"); 
											$n_related = $con->query("SELECT * FROM `lead_master`   $wherea AND `assign_for` = '".$com_users->id."' AND `close` = '2'"); 
											$customer = $con->query("SELECT * FROM `lead_master`   $wherea AND `assign_for` = '".$com_users->id."' AND `customer` = '1'"); 
											$total_all_leads += $total_leads->num_rows;
											$total_all_follow += $follow->num_rows;
											$total_all_open += $open->num_rows; 
											$total_all_close += $close->num_rows; 
											$total_all_customer += $customer->num_rows;
											$total_all_n_related +=  $n_related->num_rows;
									 ?>
									<?php if($total_leads->num_rows  || $open->num_rows || $follow->num_rows || $close->num_rows || $n_related->num_rows || $customer->num_rows != 0){ ?>
										<tr> 
											<td style="cursor: pointer;" title="Users Name"><?php echo $com_users->name; ?></td>	
											<td style="cursor: pointer;" title="Total Leads" onclick="window.location='user_wise.php?id=<?php echo $com_users->id; ?>&type=';"><?php echo $total_leads->num_rows; ?></td>	
											<td style="cursor: pointer;" title="Open Leads" onclick="window.location='user_wise.php?id=<?php echo $com_users->id; ?>&type=open';"><?php echo $open->num_rows; ?></td>	
											<td style="cursor: pointer;" title="FollowUp's" onclick="window.location='user_wise.php?id=<?php echo $com_users->id; ?>&type=01';"><?php echo $follow->num_rows; ?></td>	
											<td style="cursor: pointer;" title="Closure" onclick="window.location='user_wise.php?id=<?php echo $com_users->id; ?>&type=2';"><?php echo $close->num_rows; ?></td>	
											<td style="cursor: pointer;" title="Not Related" onclick="window.location='user_wise.php?id=<?php echo $com_users->id; ?>&type=3';"><?php echo $n_related->num_rows; ?></td>	
											<td style="cursor: pointer;" title="Customer" onclick="window.location='user_wise.php?id=<?php echo $com_users->id; ?>&type=4';"><?php echo $customer->num_rows; ?></td>	
										</tr>
									<?php } ?>
									<?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<th>Total</th>
										<th><?php echo $total_all_leads; ?></th>
										<th><?php echo $total_all_open; ?></th>
										<th><?php echo $total_all_follow; ?></th>
										<th><?php echo $total_all_close; ?></th>
										<th><?php echo $total_all_n_related; ?></th>
										<th><?php echo $total_all_customer; ?></th>
									</tr>
								</tfoot>
			  				</table>
			  			</div>
		  			</div>
		  		</div>



		  		 <div class="col-lg-3 col-xs-6" onclick="window.location='import_transfer.php?id=4';" style="cursor: pointer;" title="Inquiry From IndiaMart">
		          <!-- small box -->
		          <div class="small-box bg-red" style="background-color: #959692 !important;">
		            <div class="inner">
		              <h3><?php echo $indiamart->num_rows; ?></h3>

		              <p>IndiaMart</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-cloud-download"></i>
		            </div>
		            <span href="import_transfer.php?id=4" class="small-box-footer">View All <i class="fa fa-arrow-circle-right"></i></span>
		          </div>
		        </div>

		        <div class="col-lg-3 col-xs-6" onclick="window.location='import_transfer.php?id=3';" style="cursor: pointer;" title="Inquiry From TradeIndia">
		          <!-- small box -->
		          <div class="small-box bg-red" style="background-color: #9e73ce !important;">
		            <div class="inner">
		              <h3><?php echo $trade_india->num_rows; ?></h3>

		              <p>TradeIndia</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-cloud-download"></i>
		            </div>
		            <span href="import_transfer.php?id=3" class="small-box-footer">View All <i class="fa fa-arrow-circle-right"></i></span>
		          </div>
		        </div>

		  <?php } ?>
			
        <?php } ?>

        <script>
		$(function () {   
	    	$('#lead').DataTable({
	    			dom: 'tip'
	    	})

		})
	</script>