$(function() {

	var url = 'http://localhost/rewind/web/login.php';
	
	$('#button').click(function() {

		$('#error').hide();

		var username = $('#username').val();
		var password = $('#password').val();

		if(username != '' && password != '') {
			$.ajax({
				url: url,
				type: 'POST',
				data: 'username=' + username + '&password=' + password,
				success: function(result) {
					result = $.parseJSON(result);
					if(parseInt(result.success) == 1) {
						localStorage.setItem('user_id', result.user_id);
						window.location.replace('index.html');
					} else {
						$('#error').html("*" + result.error_message);
						$('#error').fadeIn(500);
					}
				}
			});
		} else {
			$('#error').html("*Please enter a User Id and password");
			$('#error').fadeIn(500);
		}

		return false;
	})
});