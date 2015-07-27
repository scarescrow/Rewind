<?php

	include 'connection.php';

	$query = "SELECT id, people FROM memories";
	$result_perm = mysql_query($query, $con) or die(mysql_error());

	$num = mysql_num_rows($result_perm);

	for($i = 0; $i < $num; $i ++) {
		$mem_id = mysql_result($result_perm, $i, "id");
		$people = mysql_result($result_perm, $i, "people");

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
	}

	mysql_close($con);

?>