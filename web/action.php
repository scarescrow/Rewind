<?php

	include 'connection.php';

	$title = $_POST['title'];
	$detail = $_POST['detail'];
	$people = $_POST['people'];
	if($people == 'all')
		$people = 'amsuv';

	$query = "INSERT INTO memories (title, detail, people) 
		VALUES ('$title', '$detail', '$people');";

	$result = mysql_query($query, $con);

	if($result)
		header('location:index.html');
	else
		echo "Could not insert, since ".mysql_error();	

?>