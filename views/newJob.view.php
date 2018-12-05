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

<html lang = "en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>HireMe New Job Form</title>
        <!--<script src = "../scripts/js/newJob.js"></script>-->
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
				<form name="createJob" method="post" action="../scripts/php/addNewJob.php" onsubmit = "">
				     
				    <h2>New Job</h2>
				    
				    Job Title <br/>
				    <input class="text" type="text" id="title" name="title" placeholder = "e.g. Senior Designer or Product Manager" required/><br/>
	
				    <br/>
				    Job Description<br/>
				    <textarea rows = "5" columns = "50" class="text" type="textarea" id="description" name="description" required/></textarea> 
				    <br/><br/>
				    
				    <label for = "category">Category</label><br/>
				    <select id = "category"> 
				        <option value = "" disabled selected> Select a Category</option>
				        <option value ="1">Design</option>
				        <option value = "2"> Programming</option>
				        <option value = "3"> DevOps & SysAdmin</option>
				        <option value = "4"> Customer Support</option>
				        <option value = "5"> Sales & Marketing </option>
				    </select><br/><br/>
				    
				    Company <br/>
	    			<input class="text" type="text" id="comp" name="comp" required/><br/><br/>
	
	    			
	    			Job Location<br/>
	    			<input class="text" type="text" id="location" name="location" placeholder="e.g. Kingston, Jamaica" requiredsss/><br/><br/>
	    			
	    
	    			<input class="ssubmit" type="submit" id ="submit" value="Submit"/>
					</form>
				</div>
		</div>
    
</html>