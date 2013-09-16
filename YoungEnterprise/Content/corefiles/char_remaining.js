$('#message').keyup(
			function(){
				var max = 200;
				var length = $('#message').val().length;
				var left = max - length;
				$('#count').html(left+' characters remaining');
			}
		);