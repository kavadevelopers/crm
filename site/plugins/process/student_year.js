$(document).ready(function(){	
	$('#year').change(function(){
		if( $(this).val() != '' )
		{
			$.ajax({
				method : "POST",
				url : "search/student_year.php",
				data : "year="+$(this).val(),
				success:function( out ){
					$("#to").each(function() {
						$("#to option").remove();
					});
					
					$.each(JSON.parse(out), function (key,value) {
						$("#to").append( value );
					});
				}
			});
		}
		else
		{
			$.ajax({
				method : "POST",
				url : "search/student_year.php",
				data : "yearem="+$(this).val(),
				success:function( out ){
					$("#to").each(function() {
						$("#to option").remove();
					});
					
					
						$("#to").append( out );
					
				}
			});
		}
	});
});