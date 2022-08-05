<?php include_once('header.php'); ?>
<?php include_once('sidebar.php'); ?>
<title><?= company ?> | Dashboard</title>

<div class="content-wrapper">

	<section class="content-header">
		<?php if($user->auth == 0){ ?>
		<h1>
			Welcome <b><u><i><?php echo $user->name;?></i></u></b> 
		</h1>
	<?php }else{ ?>
		<h1>
			Dashboard
		</h1>
	<?php } ?>
		<ol class="breadcrumb">
	        <li class="active"><i class="fa fa-home"></i> Home</li>
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
		<?php } unset($_SESSION['msg']);?>.
		<?php if($user->auth == 1){ ?>
		<div class="row" style="">
		<div class="col-md-3 pull-right" style="display:none;">
			<select id="close" name="transfer" class="form-control" onchange="searchFilter()" required="required">
				 	<option value="0" >-- Select User --</option> 
				 	<?php while($company_user1 = $company_user->fetch_object()){ ?>
						<option value="<?php echo $company_user1->id; ?>" ><?php echo $company_user1->name; ?></option>
				    <?php } ?>
			</select>
		</div>
		</div>
	<?php }else{ ?>
		<input type="hidden" name="" id="close" value="<?php echo $user->id; ?>">
	<?php } ?>

		<div class="row"  id="result_items" style="display: none;">
			
		</div>
    </section>

<script>
$(document).ready(searchFilter());
function searchFilter() { 
	var type = $('#close').val();  
    $.ajax({
        type: 'POST',
        url: 'result_index.php',
        data:'type='+type,
        success: function (html) {
			$('#result_items').fadeIn('slow');
			$('#result_items').html(html);
        }
    });
}


</script>
	
</div>
<?php include_once('footer.php'); ?>