<?php
	
	session_start();
	
	if((!isset($_SESSION['SESS_EMAIL'])) || (trim($_SESSION['SESS_USERID']) == '') || (!isset($_SESSION['SESS_PASS']))) {
		header("location: ../login.html");
		exit();
	}
	
	require('../scripts/php/connect.php');
	$id=$_SESSION['SESS_USERID'];
?>
<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>HireMe New User Form</title>
		<link rel="stylesheet" href = "../styles/addUser.css" type="text/css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	</head>
	
	<body>
		<div class="wrapper">
			<div class="header">
	    		<p id="h">HireMe</p>    		
	    	</div>
	    	
	    	<div class="sidebar">
				<a href="../scripts/php/homescreen.php"><p class = "fa fa-home">&nbspHome</p></a><br/>
				<a href="/views/addUser.view.php"><p class = "fa fa-user-plus">&nbspAdd user</p></a><br/>
				<a href="/views/newJob.view.php"><p class = "fa fa-edit">&nbspNew Job</p></a><br/>
				<a href="/scripts/php/logout.php"><p class = "fa fa-power-off">&nbspLog Out</p></a>
	    	</div>
			
			<div class="content" id = "form_input">
				<form name="createUser" method="post" action="../scripts/php/addUser.php">
				     
				    <h2>New User</h2>
				    
				    <p>First Name:</p>
				    <input class="text" type="text" id="fname" name="fname" required/><br/><br/>
	
				    
				    <p>Last Name:</p>
				    <input class="text" type="text" id="lname" name="lname" required/><br/><br/>
				    
				    
				    <p>Password:</p> 
	    			<input class="text" type="password" id="pword" name="pword" required/><br/><br/>
	
	    			
	    			<p>Email:</p>
	    			<input class="text" type="email" id="email" name="email" placeholder="e.g. helpme@nomreschool.com" required/><br/><br/>
	    			
	    			
	    			<p>Telephone:</p>
	    			<input class="text" type="text" id="tele" name="tele" placeholder="e.g. 555-555-5555" required/><br/><br/>
	    
	    			<input class="ssubmit" type="submit" value="Submit"/>
					</form>
				</div>
		</div>