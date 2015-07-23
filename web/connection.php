<?php

	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'memories';

	$con = mysql_connect($host, $user, $pass);
	mysql_select_db($db, $con);

?>