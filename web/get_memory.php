<?php

	include 'connection.php';

	$id = 0;
	if(!empty($_GET['id']))
		$id = $_GET['id'];

	//TODO: Add logic for selecting by person

	$query = "SELECT MAX(id) AS m FROM memories";
	$result = mysql_query($query, $con);
	$max = mysql_result($result, 0, "m");
	$max = intval($max);

	$rand_id = $id;
	while($rand_id == $id)
		$rand_id = rand(1, $max);

	$query = "SELECT * FROM memories WHERE id = '$rand_id'";
	$result = mysql_query($query, $con);

	$result_array = array();

	$result_array['id'] = mysql_result($result, 0, "id");
	$result_array['title'] = mysql_result($result, 0, "title");
	$result_array['detail'] = mysql_result($result, 0, "detail");

	echo json_encode($result_array);

?>