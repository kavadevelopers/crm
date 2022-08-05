$(function(){
	$('#select_hostel').change(function(){
		if($(this).val() != '' )
		{
			$.ajax({
				method : "POST",
				url : "search/room_select.php",
				data : "hostel="+$(this).val(),
				success:function( out ){
					$("#select_block").each(function() {
						$("#select_block option").remove();
					});
					$.each(JSON.parse(out), function (key,value) {
						$("#select_block").append( value );
					});
				}
			});
		}
		else
		{
					$("#select_block").each(function() {
						$("#select_block option").remove();
					});
					$("#select_room").each(function() {
						$("#select_room option").remove();
					});
					$("#select_block").append( '<option value="">-- Select Block --</option>' );
					$("#select_room").append( '<option value="">-- Select Room No. --</option>' );
		}
	});
	$('#select_block').change(function(){
		$.ajax({
			method : "POST",
			url : "search/room_select.php",
			data : "block="+$(this).val(),
			success:function( out ){
				$("#select_room").each(function() {
					$("#select_room option").remove();
				});
				$.each(JSON.parse(out), function (key,value) {
					$("#select_room").append( value );
				});
			}
		});
	});
});