<?php
	
	session_start();
	
	if((!isset($_SESSION['SESS_EMAIL'])) || (trim($_SESSION['SESS_USERID']) == '') || (!isset($_SESSION['SESS_PASS']))) {
		header("location: ../../login.html");
		exit();
	}
	
	require('connect.php');
	$id=$_SESSION['SESS_USERID'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Home Screen</title>
		<link rel="stylesheet" type="text/css" href="styles/homescreen.css"/>
		<script src = "scripts/js/homescreen.js" type = "text/javascript"></script>
	</head>
	<body>
		<h1> Dashboard </h1>
		<br/><br/>
		<a href="logout.php"><p class = "fa fa-power-off">&nbspLog Out</p></a>
		
		<h3>Available Jobs</h3>
	</body>
</html>