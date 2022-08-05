<?php include_once('header.php'); ?>
<?php include_once('sidebar.php');  ?>
<title><?= company ?> | Manage Leads</title>

<div class="content-wrapper">
    <style type="text/css">
    	#loading {
		   width: 100%;
		   height: 100%;
		   left: 0;
		   position: fixed;
		   display: block;
		   z-index: 99;
		   text-align: center;
		}

		#loading-image {
		  position: absolute;
		  z-index: 100;
		}
    </style>
    <section class="content-header">
		<h1>
			Manage Leads
		</h1>
		<ol class="breadcrumb">
			<li class=""><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
	        <li class="active"><i class="fa fa-list"></i> Manage Lead</li>
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
							<div class="col-md-3">
			              	<input type="hidden" id="user_id">
				              <select id="close" class="form-control" onchange="searchFilter()">
				              	<option value="0">Leads</option>
				              	<option value="1">Open</option>
				              	<option value="pending" >Pending</option>
				              	<option value="2">Closer</option>
				              	<option value="3">Not Related</option>
				              	<option value="4">Customer</option>
				              </select>
			              	</div>
							<?php if($user->auth != 0){ ?><a href="add_lead.php" class="btn btn-success  btn-sm pull-right">Add Lead</a><?php } ?>
							
						</div>
						<div id="loading" class="box-body" style="display: none; ">
						  <img id="loading-image" src="image/load_div.gif" alt="Loading..." />
						</div>
					<div class="box-body" id="result_items" style="overflow-x: scroll; display: none;" >
						
					</div>
				</div>
			</div>
		</div>
    </section>


</div>

<script>
window.onload = function(){searchFilter();};
function searchFilter() { 
	var type = $('#close').val();  
	  
    $.ajax({
        type: 'POST',
        url: 'followup/all_leads.php',
        data:'type='+type,
        beforeSend: function(){
	     	$('#loading').fadeIn();
	  	},
        success: function (html) {
        	$('#loading').fadeOut('slow');
			$('#result_items').fadeIn('slow');
			$('#result_items').html(html);
        }
    });
}


</script>

<?php include_once('footer.php'); ?>