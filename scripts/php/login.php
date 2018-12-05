<?php
/*checks for post request along with login variables. Sets sesssion variable with */
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
    	session_start();
		include('connect.php'); 
		
    	if((isset($_POST['email'])) && (isset($_POST['password'])) && !empty($_POST['email']) && !empty($_POST['password'])){
    	
	
			$email = emailFilter($_POST['email']);
			$pword = pwordFilter($_POST['password']);	
			if ($email === "" || $pword === ""){
				session_destroy();
				header("Location ../../login.html");
			}
	        
	        $password = md5($pword);
	        
	        $stmt = $conn->prepare("SELECT * FROM Users WHERE email = '$email' AND password = '$password'");
			
			$stmt->execute();
			
		
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	        
	        if ($results[0]['email']==$email && $results[0]['password']==$password){
		    	session_regenerate_id();
				echo "User verified";
				$_SESSION['SESS_EMAIL'] = $results[0]['email'];
				$_SESSION['SESS_USERID'] = $results[0]['id'];
				$_SESSION['SESS_PASS'] = $results[0]['password'];
				session_write_close();
				header("Location: homescreen.php");
				
	        }else{
				echo "A username or password error prevented login, try again.";
				session_destroy();
				header("Location: ../../login.html");
			}
        
    	}
    	$conn=null;
    }
    
    //Filtering and Sanitizing the variables
    function generalFilter($input){
    	$input = htmlspecialchars($input);
		$input = trim($input);
		$input = stripslashes($input);
		return $input;
    }
    
    function emailFilter($input){
        
		if (empty($input)){ //Ensuring that the user name field is not empty
			echo "Please enter the email address";
			return '';
		}else{
			$input = generalFilter($input);
			return $input;
		}
	}
	
	function pwordFilter($input){
		if (empty($input)){ //Ensuring that the password field is not empty
			echo "Please enter the password";
			return '';
		}else{
			$input = generalFilter($input);
			return $input;
		}
	}			
	
	