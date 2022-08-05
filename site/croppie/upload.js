$(document).ready(function(){    
	$image_crop = $('#upload-image').croppie({
		enableExif: true,
		viewport: {
			width: 150,
			height: 150,
			type: 'square'
		},
		boundary: {
			width: 200,
			height: 200
		}
	});
	$('#images').on('change', function () { 
		var reader = new FileReader();
		reader.onload = function (e) {
			$image_crop.croppie('bind', {
				url: e.target.result
			}).then(function(){
				//console.log('jQuery bind complete');
			});			
		}
		reader.readAsDataURL(this.files[0]);
	});
	$('.cropped_image').on('click', function (ev) {
		$('.cropped_image').hide();
		$('#cropped_image').show();
		$image_crop.croppie('result', {
			type: 'canvas',
			size:{ 
					width: 500,
					height: 500 
				}
		}).then(function (response) {
			$.ajax({
				url: "croppie/upload.php",
				type: "POST",
				data: {"image":response},
				success: function (data) {
					setInterval(function() {
						
							window.location.reload(true);
						
					}, 1000);
				}
			});
		});
	});	
});