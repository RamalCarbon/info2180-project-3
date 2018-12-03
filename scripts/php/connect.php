<?php

	$servername = getenv('IP'); 
	$dbname = 'Jobs';
	$dbusername = getenv('C9_USER');
	$dbpassword = ''; 
	
	$conn = new PDO ("mysql:host=$servername;dbname=$dbname", $db_u_name, $db_password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>