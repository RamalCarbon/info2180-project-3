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
		<meta charset="UTF-8">
		<title>Home Screen</title>
		<link rel="stylesheet" type="text/css" href="/styles/homescreen.css"/>
		<script src = "scripts/js/homescreen.js" type = "text/javascript"></script>
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
				<a href="logout.php"><p class = "fa fa-power-off">&nbspLog Out</p></a>
	    	</div>
			
			<div class="content" id = "form_input">
				<h1> Dashboard </h1>
				<br/><br/>
			
				
			<div class = item>
				<h3>Available Jobs</h3>
				<table>
					<tr>
						<th>Company</th><th>Job Title</th><th>Category</th><th>Date</th>
					</tr>
					<?php
						$stmt = $conn -> query("SELECT * FROM Jobs");
						while ($row = $stmt -> fetch())
						{
							extract($row);
							echo "<tr><td>$company_name</td><td>$job_title</td><td>$category</td><td>$date_posted</td></tr>";
						}
				?>
				</table>
			</div>
			<div class = item>
				<h3> Jobs Applied For </h3>
				<table>
					<tr> 
						<th>Company</th><th>Job Title</th><th>Category</th><th>Date</th>
					</tr>
					<?php
					if (isset($_SESSION['user_id'])){
						$stmt = $conn -> prepare("SELECT *FROM 'Applied' where user_id = ?");
						$stmt -> execute([$_SESSION['user_id']]);
						while ($row = $stmt -> fetch())
						{
							extract($row);
							$stmt2 = $conn -> prepare ("SELECT company_name, job_title, category FROM Jobs where id =?");
							$stmt2 -> execute([$job_id]);
							$row2 = $stmt2 -> fetch();
							extract($row2);
							echo "<tr><td>$company_name</td><td>$job_title</td><td>$category</td><td>$date_applied</td></tr>";
						}
						
							}
							?>
					
				</table>
				</div>
				</div>
				
	</body>
</html>