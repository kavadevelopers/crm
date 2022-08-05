$(function(){
	$('#school').change(function(){
		if( $('#school').val() == '' )
		{
			
			$.ajax({
				method : "POST",
				url : "search/school.php",
				data : "schoolem="+$(this).val(),
				success:function( out ){
					$("#branch").each(function() {
						$("#branch option").remove();
					});
					$.each(JSON.parse(out), function (key,value) {
						$("#branch").append( value );
					});
				}
			});
			
		}
		else
		{
			$.ajax({
				method : "POST",
				url : "search/school.php",
				data : "school="+$(this).val(),
				success:function( out ){
					$("#branch").each(function() {
						$("#branch option").remove();
					});
					$.each(JSON.parse(out), function (key,value) {
						$("#branch").append( value );
					});
				}
			});
		}
	});
	$('#branch').change(function(){
		if( $(this).val() != '' )
		{
			$.ajax({
				method : "POST",
				url : "search/school.php",
				data : "branch="+$(this).val(),
				success:function( out ){
					$("#school").each(function() {
						$("#school option").remove();
					});
					$.each(JSON.parse(out), function (key,value) {
						$("#school").append( value );
					});
				}
			});
		}
		else
		{
			$.ajax({
				method : "POST",
				url : "search/school.php",
				data : "branchem="+$(this).val(),
				success:function( out ){
					$("#school").each(function() {
						$("#school option").remove();
					});
					$.each(JSON.parse(out), function (key,value) {
						$("#school").append( value );
					});
				}
			});
		}
	});
});