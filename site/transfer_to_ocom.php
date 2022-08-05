<?php include_once('header.php'); ?>
<?php include_once('sidebar.php'); ?>
<title><?= company ?> | Lead Transfer</title>

<div class="content-wrapper">
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
	<section class="content-header">
		<h1>
			Lead Transfer
		</h1>
		<ol class="breadcrumb">
	        <li class=""><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
	        <li class="active">Lead Transfer</li>
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
			if($user->auth == 2)
			{
				$company_user = $con->query("SELECT * FROM `user` WHERE `id` = '".$user->id."'");
			}
			else
			{
				$company_user = $con->query("SELECT * FROM `user` WHERE `c_id` = '".$user->c_id."'");
			}
			
			$company_user2 = $con->query("SELECT * FROM `company` WHERE `df` = '0'");
		
		?>

		<form action="process/change_company.php" method="post" id="submit" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
			            <div class="box-header with-border">
			              	<div class="col-md-3 ">

				              <select id="close" name="transfer" class="form-control" onchange="searchFilter()" required="required">
				              	<?php if($user->auth == 2) { ?>
				             	<?php while($company_user1 = $company_user->fetch_object()){ ?>
				             		<option value="<?php echo $company_user1->id; ?>" ><?php echo $company_user1->name; ?></option>
				             	<?php } }else{ ?>
				             	<option value="" >-- Select Name To View Lead --</option> 
				             	<?php while($company_user1 = $company_user->fetch_object()){ ?>
				             		<option value="<?php echo $company_user1->id; ?>" ><?php echo $company_user1->name; ?></option>
				             	<?php } } ?>
				              </select>
			         		</div>

			              

							<div class="col-md-3 ">
				              <select id="close" name="to_transfer" class="form-control" required="required">
				              	
				              	<option value="" >-- Select Company To Transfer Leads--</option>
				             	<?php while($company_user23 = $company_user2->fetch_object()){ ?>
				             		<option value="<?php echo $company_user23->id; ?>" ><?php echo $company_user23->name; ?></option>
				             	<?php } ?>
				              </select>
			             	</div>
			             	<div class="col-md-3 ">
			             	
			             		<button type="submit" class="btn btn-primary">Transfer</button>
			             	
			             	</div>
			            </div>


			            <div class="box-body" id="result_items" style="overflow-x: scroll;">
			              
				                
			            	
			            </div>
			        </div>
			    </div>
			</div>
        </form>
    </section>


<script>
window.onload = function(){searchFilter();};
function searchFilter() { 
	var type = $('#close').val();  
    $.ajax({
        type: 'POST',
        url: 'followup/transfer.php',
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