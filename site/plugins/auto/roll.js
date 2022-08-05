$( function() {
	$('#roll').focus(function(){
		$( "#roll" ).autocomplete({
			source: 'search/roll.php',
				select:function(e, ui){
					$(this).val(ui.item.label);
				}
		});
	})
});