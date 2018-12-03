<?php
/*checks for post request along with login variables. Sets sesssion variable with */
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
    	
    	session_start();
    	include('connect.php');
    	
		$uname = unameFilter($_POST['uname']);
		$pword = pwordFilter($_POST['pword']);	
		if ($uname === "" || $pword === ""){
			session_destroy();
			include_once('login.html');
		}
        
        $password = md5($pword);
        
        $usertable=$conn->query("SELECT * FROM Users WHERE username = '$uname' AND password = '$password'");
        $usertable->execute();
        
        if ($usertable){
	    	session_regenerate_id();
			echo "User verified";
			$_SESSION['SESS_UNAME'] = $usertable['username'];
			$_SESSION['SESS_USERID'] = $usertable['id'];
			session_write_close();
        }else{
			echo "A username or password error prevented login, try again.";
			session_destroy();
			include_once('login.html');
		}
        
        if(isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){
       
        }   
    }
    
    //Filtering and Sanitizing the variables
    function generalFilter($input){
    	$input = htmlspecialchars($input);
		$input = trim($input);
		$input = stripslashes($input);
		return $input;
    }
    
    function unameFilter($input){
        
		if (empty($input)){ //Ensuring that the user name field is not empty
			echo "Please enter the username";
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
	
	