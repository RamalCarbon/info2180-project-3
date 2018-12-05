<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
        include('connect.php');
        
        $password="";
        $salt = mt_rand();
        
        $fname = nameFilter($_POST['fname']);
    	$lname = nameFilter($_POST['lname']);
    	$pword = pwordFilter($_POST['pword']);
    	$email = emailFilter($_POST['email']);
    	$tele = teleFilter($_POST['tele']);
    				
    	$password = md5($pword);
    	$pword = "";
    	
    	if (empty($fname) || empty($lname) || empty($email) || empty($password) || empty($tele)){
    		echo "Empty fields where detected, the database will not be updated";
    	}else{ 
    		try{
                $sql = "INSERT INTO Users (firstname, lastname, password, email, telephone ) VALUES ('$fname', '$lname', '$password', '$email', '$tele')";
    			$conn->exec($sql);
    			echo ("Data recorded successfully \n");
    			
    		}catch(PDOException $e){
    		    
    			echo $sql.$e->getMessage();
    			echo ("\n Data NOT recorded \n");
    			
    		}
    		$conn = null;
    	}
    }
    	
    	function generalFilter($input){
    	    
    	    $input = htmlspecialchars($input);
    	    $input = trim($input);
    	    $input = stripslashes($input);
    	    
    	    return $input;
    	}
    	
    	function nameFilter($input){
    		if(empty($input)){ 
    			echo "An [empty name] error occurred";
    			return '';
    		}else{
    			$input = generalFilter($input);
    			return $input;
    		}
    	    return '';
        }
        
        function pwordFilter($input){
    		if (empty($input)){
    		    
    		echo "An empty password error occurred";
    		return '';
    		
    		}else if(!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $input)){
    			echo "A password matching error occurred";
    			return '';
    		}else{
    			$input = generalFilter($input);
    			return $input;
    	    }
    	    return '';
        }
        
        function emailFilter($input){
    		if (empty($input)){ 
    			echo "An email error occurred";
    			return '';
    		
    		}else if(!filter_var($input, FILTER_VALIDATE_EMAIL)){
        		echo "A password matching error occurred";
        		return '';
    		
    		}else{
    			$input = generalFilter($input);
    			return $input;
    		}
    		return '';
        }
        
        function teleFilter($input){
            if (empty($input)){ 
    			echo "An telephone error occurred";
    			return '';
    		
    		}else if(!(preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $input))){
        		echo "A telephone matching error occurred";
        		return '';
    		
    		}else{
    			$input = generalFilter($input);
    			return $input;
    		}
    		return '';
        }
        
        
?>
			