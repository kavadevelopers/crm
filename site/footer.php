  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <i><b>Developed by</b></i> <strong><a href="http://www.kavadevelopers.com/" target="_blank">Kava Developers</a></strong>
    </div>
    <strong>Copyright &copy; 2017-<?php echo date('Y'); ?> <a href="javascript:;" target="_blank"><?= company ?></a></strong> All rights
    reserved.
  </footer>
<script type="text/javascript">
	$(document).ready(function() {
		setTimeout(
		    function() {
		      	$('.alert').fadeOut('slow');
		    }, 3000
		);
	});
</script>

<?php $indiaaa = $con->query("SELECT * FROM `india` WHERE `c_id` = '".$user->c_id."'")->fetch_object(); 
 if(DateDiffInterval($indiaaa->last_date.' '.$indiaaa->last_time,date('Y-m-d H:i:s'),'M') > 20){ ?>
<script>
$(document).ready(function() {
    $.ajax({
        type: 'POST',
        url: 'import_indiamart.php',
        success: function (html) {
      		//alert(html);
        }
    });
});
</script>
<?php } ?>

<script>
$(document).ready(back_ground());
function back_ground() {
    $.ajax({
        type: 'POST',
        url: 'import_trade.php',
        success: function (html) {
      
        }
    });
}
</script>
<script type="text/javascript" src="plugins/jQuery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jQueryUI/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="plugins/datepicker/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<script src="js/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="js/datatables.net/js/dataTables.bootstrap.min.js"></script>
<script src="js/datatables.net/js/dataTables.buttons.min.js"></script>
<script src="js/datatables.net/js/buttons.flash.min.js"></script>
<script src="js/datatables.net/js/buttons.html5.min.js"></script>
<script src="js/datatables.net/js/buttons.print.min.js"></script>
<script src="js/datatables.net/js/pdfmake.min.js"></script>
<script src="js/datatables.net/js/vfs_fonts.js"></script>
<script src="js/datatables.net/js/jszip.min.js"></script>

<!-- AdminLTE App -->
<script src="croppie/croppie.js"></script>  
<script src="dist/js/app.min.js"></script>
<script src="build/select2.full.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>

<?php
function DateDiffInterval($sDate1, $sDate2, $sUnit='H') {
//subtract $sDate2-$sDate1 and return the difference in $sUnit (Days,Hours,Minutes,Seconds)
    $nInterval = strtotime($sDate2) - strtotime($sDate1);
    if ($sUnit=='D') { // days
        $nInterval = $nInterval/60/60/24;
    } else if ($sUnit=='H') { // hours
        $nInterval = $nInterval/60/60;
    } else if ($sUnit=='M') { // minutes
        $nInterval = $nInterval/60;
    } else if ($sUnit=='S') { // seconds
    }
    return $nInterval;
}

?>