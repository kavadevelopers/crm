<?php include_once('header.php'); ?>
<?php include_once('sidebar.php'); ?>
<title><?= company ?> | FollowUp's</title>

<div class="content-wrapper">

	<section class="content-header">
		<h1>
			FollowUp's
		</h1>
		<ol class="breadcrumb">
	        <li class=""><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
	        <li class="active"><i class="fa fa-comment"></i> FollowUp</li>
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
		<?php 
			
		
		
		if(isset($_GET['id']))
		{
			$id = $_GET['type'];
		}
		else
		{
			$id = '';
		}
		?>
			<div class="row">
				<div class="col-md-12">
					<div class="box">
			            <div class="box-header">
			              <h3 class="box-title">User - <?php echo get_user($con,$_GET['id']); ?></h3>
			              <div class="col-md-3 pull-right">
			              	<input type="hidden" id="user_id" value="<?php echo $_GET['id']; ?>">
			              	<input type="hidden" id="typer" value="<?php echo $_GET['type']; ?>">
			              <select id="close" class="form-control" onchange="searchFilter()">
			              	
			              	<option value="0" <?php if($id == ''){ echo "selected"; } ?>>Leads</option>
			              	<option value="1" <?php if($id == 'open'){ echo "selected"; } ?>>Open</option>
			              	<option value="pending" <?php if($id == '01'){ echo "selected"; } ?>>Pending</option>
			              	<option value="2" <?php if($id == '2'){ echo "selected"; } ?>>Closer</option>
			              	<option value="3" <?php if($id == '3'){ echo "selected"; } ?>>Not Related</option>
			              	<option value="4" <?php if($id == '4'){ echo "selected"; } ?>>Customer</option>
			              </select>
			              </div>
			            </div>
			            <div class="box-body" id="result_items" style="overflow-x: scroll;">
			              
				                
			            	
			            </div>
			        </div>
			    </div>
			</div>
        
    </section>


<script>
window.onload = function(){searchFilter();};
function searchFilter() { 
	var type = $('#close').val();  
	var user = $('#user_id').val();  
	var typer = $('#typer').val();  
    $.ajax({
        type: 'POST',
        url: 'followup/user_wise.php',
        data:'type='+type+'&user='+user+'&typer='+typer,
        success: function (html) {
			$('#result_items').fadeIn('slow');
			$('#result_items').html(html);
        }
    });
}


</script>
	
</div>
<?php include_once('footer.php'); ?>