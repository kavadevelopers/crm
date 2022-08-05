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
			$id = $_GET['id'];
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
			            	
			              <h3 class="box-title">FollowUp's</h3>
			              <div class="col-md-3 pull-right">

			              	<input type="hidden" id="typer" value="<?php echo $_GET['id']; ?>">
			              	
			              <select id="close" class="form-control" onchange="searchFilter()">
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
	var typer = $('#typer').val();  
    $.ajax({
        type: 'POST',
        url: 'followup/result.php',
        data:'type='+type+'&typer='+typer,
        success: function (html) {
			$('#result_items').fadeIn('slow');
			$('#result_items').html(html);
        }
    });
}


</script>
	
</div>
<?php include_once('footer.php'); ?>