<?php

	include 'connection.php';

	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$query = "INSERT INTO users (name, username, password) VALUES ('$name', '$username', '$password');";
	$result = mysql_query($query, $con);

	if($result)
		header('location:add.html');
	else
		echo mysql_error();

	mysql_close($con);

?>