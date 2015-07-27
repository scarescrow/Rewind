<?php

	include 'connection.php';

	$response = array('success' => 0, 'error' => 0);

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$query = "SELECT id FROM users 
				WHERE username = '$username'
				AND password = '$password'";
	$result = mysql_query($query, $con);

	if(mysql_num_rows($result) == 1) {

		$response['success'] = 1;
		$response['user_id'] = mysql_result($result, 0, "id");

	} else {

		$response['error'] = 1;
		$response['error_message'] = "Incorrect User Id/Password";

	}

	mysql_close($con);

	echo json_encode($response);

?>