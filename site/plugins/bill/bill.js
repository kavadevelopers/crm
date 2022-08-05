$(function(){
	var x = 1;
	var tr = $('#table >tbody >tr').length; 
	$(document).on('click', '#add_field_button',function(e){ 
		e.preventDefault();
        x++;
		var newtr = '<tr id="'+x+'"><td style="text-align:center;">'+ x +'</td><td><input type="text" class="form-control" id="x'+x+'" name="item_name[]" autocomplete="off" spellcheck="false" placeholder="Search Menu Item Name" required /></td><input type="hidden" name="item_id[]" id="x'+x+'item_id" /><td><input type="text" class="form-control" id="x'+x+'item_price" name="item_price[]" autocomplete="off" spellcheck="false" placeholder="Rate" required readonly /></td><td><input type="text" class="form-control" id="x'+x+'item_quy" name="item_quy[]" autocomplete="off" spellcheck="false" placeholder="Quantity" required /></td><td><input type="text" class="form-control" id="x'+x+'item_total" name="item_total[]" autocomplete="off" spellcheck="false" placeholder="Total" required readonly /></td><td><a href="javascript:;" id="remove" class="btn btn-primary btn-danger">Remove</a></td></tr>';
		$('table tbody').append(newtr);
			
			$( "#x"+x ).autocomplete( {
				  source: 'search/menu.php',
					select:function(e, ui){
						e.preventDefault();
						$(this).val(ui.item.value);
						$('#'+this.id+'item_id').val(ui.item.menu_id);
						$('#'+this.id+'item_price').val(parseInt(ui.item.price) / 100);
						$(this).attr("readonly", true);
					},
					change: function( e, ui ) {
						if(ui.item==null)
						{
							this.value='';
						}
					}
			} );
			
			$("#x"+x).click(function(){
				$(this).removeAttr('readonly');
				$(this).val('');	
				$('#'+this.id+'item_id').val('');
				$('#'+this.id+'item_price').val('');
			});
		
		
			$('#x'+x+'item_quy').keypress(function (e) {
				if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
			});
			
			$('#x'+x+'item_quy').keyup(function(){
				price = parseFloat($('#'+this.id.replace("item_quy", "")+'item_price').val());
				qty = parseFloat($(this).val());
				if(price && qty)
				{
					$('#'+this.id.replace("item_quy", "")+'item_total').val(price * qty);
					total_bill();
				}
				else
					{
						$('#'+this.id.replace("item_quy", "")+'item_total').val('');
					}
			});
    });
	
	$('#table tbody').on("click","#remove", function(e){
		e.preventDefault(); $(this).closest('tr').remove();
		total_bill();
    });
	
	
	$('#x1item_quy').keypress(function (e) {
		if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
	});
	
			$( "#x1" ).autocomplete( {
				  source: 'search/menu.php',
					select:function(e, ui){
						e.preventDefault();
						$(this).val(ui.item.value);
						$('#'+this.id+'item_id').val(ui.item.menu_id);
						$('#'+this.id+'item_price').val(parseInt(ui.item.price) / 100);
						$(this).attr("readonly", true);
					},
					change: function( e, ui ) {
						if(ui.item==null)
						{
							this.value='';
						}
					}
			} );
			
			$("#x1").click(function(){
				$(this).removeAttr('readonly');
				$(this).val('');	
				$('#x1item_id').val('');
				$('#x1item_price').val('');
			});
			
			$('#x1item_quy').keyup(function(){
				price = parseFloat($('#'+this.id.replace("item_quy", "")+'item_price').val());
				qty = parseFloat($(this).val());
				if(price && qty)
				{
					$('#'+this.id.replace("item_quy", "")+'item_total').val(price * qty);
					total_bill();
				}
				else
					{
						$('#'+this.id.replace("item_quy", "")+'item_total').val('');
					}
			});
			
			
			function total_bill()
			{
				n = 1;
				total = 0;
				//tr = $('#table >tbody >tr').length;
				var tr = $('#table tbody tr:last').attr('id');
				while( n <= tr )
				{
					price = parseFloat($('#x'+n+'item_price').val());
					qty = parseFloat($('#x'+n+'item_quy').val());
					if(qty && price)
					{
						total += qty * price;
					}
					n++;
				}
				$('#total_bill').val(total);
				$('#final_bill').val(total);
				discount_func();
			}
			
			
			$('#zomato').change(function(){
			discount_func();
		});
		$('#facebook').change(function(){
			discount_func();
		});
		$('input[name=radioInline]').change(function(){
			discount_func();
		});
		
		function discount_func()
		{
			discount_total = 0;
			if($('#zomato').prop('checked'))
			{
				if( $('#total_bill').val() )
				{
					discount_total += 10;
				}
			}
			
			if($('#facebook').prop('checked'))
			{
				if( $('#total_bill').val() )
				{
					discount_total += 5;
				}
			}
			
			if($('input[type=radio]').filter(':checked').val())
			{	
				if( $('#total_bill').val() )
				{
					discount_total += parseFloat($('input[name=radioInline]:checked').val());
				}	
			}
			
			if( $('#total_bill').val() )
			{	
				discount = parseFloat($('#total_bill').val()) * parseFloat(discount_total) / 100;
				$('#off').val(discount_total+' %');
				$('#final_bill').val( parseFloat($('#total_bill').val()) - discount );
			}
		}
	
});