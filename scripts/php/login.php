<?php
/*checks for post request along with login variables. Sets sesssion variable with */
    session_start();
	include('connect.php'); 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
    	session_start();
		include('connect.php'); 
		
    	if((isset($_POST['email'])) && (isset($_POST['password'])) && !empty($_POST['email']) && !empty($_POST['password'])){
    	
	
			$email = emailFilter($_POST['email']);
			$pword = pwordFilter($_POST['password']);	
			if ($email === "" || $pword === ""){
				session_destroy();
				include_once('../../login.html');
			}
	        
	        $password = md5($pword);
	        
	        $stmt = $conn->prepare("SELECT * FROM Users WHERE email = '$email' AND password = '$password'");
			
			$stmt->execute();
		
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	        
	        if ($result['email']==$email && $result['password']==$password){
		    	session_regenerate_id();
				echo "User verified";
				$_SESSION['SESS_EMAIL'] = $result['email'];
				$_SESSION['SESS_USERID'] = $result['id'];
				$_SESSION['SESS_PASS'] = $result['password'];
				die("email:".$_SESSION['SESS_EMAIL']."id:". $_SESSION['SESS_USERID']." password: ". $_SESSION['SESS_PASS'] );
				session_write_close();
				header("Location: homescreen.php");
				
	        }else{
				echo "A username or password error prevented login, try again.";
				session_destroy();
				include_once('../../login.html');
			}
        
    	}
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
	
	