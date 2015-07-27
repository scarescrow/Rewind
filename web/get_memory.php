<?php

	include 'connection.php';

	$id = 0;
	if(empty($_POST['mem_id']) || empty($_POST['user_id']))
		die($_POST['mem_id']);

	$id = $_POST['mem_id'];
	$user_id = $_POST['user_id'];

	$ids = array();

	$query = "SELECT memory_id FROM memory_to_user WHERE memory_id <> '$id' AND user_id='$user_id'";
	$result = mysql_query($query, $con);

	for($i = 0; $i < mysql_num_rows($result); $i ++)
		$ids[] = mysql_result($result, $i, "memory_id");

	$max = count($ids);

	$rand_id = rand(1, $max) - 1;
	$rand_id = $ids[$rand_id];

	$query = "SELECT * FROM memories WHERE id = '$rand_id'";
	$result = mysql_query($query, $con);

	$result_array = array();

	$result_array['id'] = mysql_result($result, 0, "id");
	$result_array['title'] = mysql_result($result, 0, "title");
	$result_array['detail'] = nl2br(mysql_result($result, 0, "detail"));

	mysql_close($con);

	echo json_encode($result_array);

?>