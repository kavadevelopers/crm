<?php $path = basename($_SERVER['SCRIPT_NAME']);    ?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $user->image; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user->name; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
		<li class='<?php menu(array("index.php")); ?>'><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>


		<?php if($user->auth != '0'){ ?>
			<li class="treeview <?php menu(array("edit_lead.php","manage_lead.php","add_lead.php","add_follow_with_lead.php")); ?>">
			  <a href="#">
				<i class="fa fa-list"></i> <span>Leads</span>
				<span class="pull-right-container">
				  <i class="fa fa-angle-left pull-right"></i>
				</span>
			  </a>
			  <ul class="treeview-menu">
				<li class='<?php menu(array("add_lead.php")); ?>'><a href="add_lead.php"><i class="fa fa-circle-o"></i> <span>Add Leads</span></a></li>
				<li class='<?php menu(array("edit_lead.php","manage_lead.php","add_follow_with_lead.php")); ?>'><a href="manage_lead.php"><i class="fa fa-circle-o"></i> <span>Manage Leads</span></a></li>
			</ul>
			</li>
		<?php } ?>

		
		<?php if($user->auth != '0'){ ?>
			<li class='<?php menu(array("followup.php")); ?>'><a href="followup.php?id=01"><i class="fa fa-comment"></i> <span>Follow up</span></a></li>
		<?php } ?>



		
		
		
		<?php if($user->auth != '2'){ ?>
			<li class="treeview <?php menu(array("manage_status.php","manage_source.php","manage_followup_type.php","add_user.php","manage_user.php","edit_user.php","view_user.php","manage_company.php","add_company_new.php","edit_company.php")); ?>">
			  <a href="#">
				<i class="fa fa-gears"></i> <span>Settings</span>
				<span class="pull-right-container">
				  <i class="fa fa-angle-left pull-right"></i>
				</span>
			  </a>
			  <ul class="treeview-menu">
			  	<?php if($user->auth == '0'){ ?>
					<li class='<?php menu(array("manage_company.php","add_company_new.php","edit_company.php")); ?>'><a href="manage_company.php"><i class="fa fa-industry"></i> <span>Company</span></a></li>
				<?php } ?>
				
			  	<?php if($user->auth != '2'){ ?>
					<li class='<?php menu(array("add_user.php","manage_user.php","edit_user.php","view_user.php")); ?>'><a href="manage_user.php"><i class="fa fa-user"></i> <span>Users</span></a></li>
				<?php } ?>

				



				<li class="treeview <?php menu(array("manage_status.php","manage_source.php","manage_followup_type.php")); ?>">
				  <a href="#">
					<i class="fa fa-th"></i> <span>Widget Management</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
						<li class='<?php menu(array("manage_status.php")); ?>'><a href="manage_status.php"><i class="fa fa-circle-o"></i>Manage Status</a></li>
						<li class='<?php menu(array("manage_source.php")); ?>'><a href="manage_source.php"><i class="fa fa-circle-o"></i>Manage Source</a></li>
						
					 </ul>
			</li>

			 </ul>

			
			 
			</li>
		<?php } ?>
			
		
		
		
		
		
		
		
		
		<?php if($user->auth != '0'){ ?>
		 <li class='<?php menu(array("lead_transfer.php")); ?>'><a href="lead_transfer.php"><i class="fa fa-arrow-right"></i> <span>Lead Transfer</span></a></li>
		 <li class='<?php menu(array("transfer_to_ocom.php")); ?>'><a href="transfer_to_ocom.php"><i class="fa fa-arrow-right"></i> <span>Transfer To Other Company</span></a></li>
		<?php } ?>
		
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  