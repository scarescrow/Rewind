<?php

	include 'connection.php';

	$title = str_replace("'", "\'", $_POST['title']);
	$detail = str_replace("'", "\'", $_POST['detail']);
	$people = str_replace("'", "\'", $_POST['people']);

	if($people == 'all')
		$people = 'amsuv';

	$query = "SELECT MAX(id) as max_id FROM memories;";
	$result = mysql_query($query, $con);

	$mem_id = intval(mysql_result($result, 0, "max_id")) + 1;

	$query = "INSERT INTO memories (id, title, detail) 
		VALUES ('$mem_id', '$title', '$detail');";

	$result = mysql_query($query, $con);

	if(strpos($people, 'a') !== false) {
		$query = "INSERT INTO memory_to_user (memory_id, user_id)
			VALUES ('$mem_id', 1)";
		$result = mysql_query($query, $con) or die(mysql_error());
	}

	if(strpos($people, 's') !== false) {
		$query = "INSERT INTO memory_to_user (memory_id, user_id)
			VALUES ('$mem_id', 2)";
		$result = mysql_query($query, $con);
	}

	if(strpos($people, 'm') !== false) {
		$query = "INSERT INTO memory_to_user (memory_id, user_id)
			VALUES ('$mem_id', 3)";
		$result = mysql_query($query, $con);
	}

	if(strpos($people, 'u') !== false) {
		$query = "INSERT INTO memory_to_user (memory_id, user_id)
			VALUES ('$mem_id', 4)";
		$result = mysql_query($query, $con);
	}

	if(strpos($people, 'v') !== false) {
		$query = "INSERT INTO memory_to_user (memory_id, user_id)
			VALUES ('$mem_id', 5)";
		$result = mysql_query($query, $con);
	}

	mysql_close($con);
	
	if($result) {
		header('location:index.html');
	}
	else
		echo "Could not insert, since ".mysql_error();	

?>