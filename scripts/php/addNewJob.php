<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
        include('../scripts/php/connect.php');
        
        $salt = mt_rand();
        
        $title = generalFilter($_POST['title']);
        $description = generalFilter($_POST['description']);
        $category = catFilter($_POST['category']);
        $comp = generalFilter($_POST['comp']);
        $location = generalFilter($_POST['location']);
        
        if (empty($title) || empty($description) || empty($category) || empty($comp) || empty($location)){
    		echo "Empty fields were detected, the database will not be updated";
    	}else{ 
    		try{
                $sql = "INSERT INTO Jobs (job_title, job_description, category, company_name, company_location ) VALUES ('$title', '$description', '$category', '$comp', '$location')";
    			$conn->exec($sql);
    			echo ("Data recorded successfully \n");
    			
    		}catch(PDOException $e){
    		    
    			echo $sql.$e->getMessage();
    			echo ("\n Data NOT recorded \n");
    			
    		}
    		$conn = null;
    	}
    }
    
    //Filtering and Sanitizing the variables
    function generalFilter($input){
    	$input = htmlspecialchars($input);
		$input = trim($input);
		$input = stripslashes($input);
		return $input;
    }
    
    function catFilter($input){
        if ($input === "1"){
            return "Design";
        }
        
        if ($input === "2"){
            return "Programming";
        }
        
        if ($input === "3"){
            return "DevOps & SysAdmin";
        }
        
        if ($input === "4"){
            return "Customer Support";
        }
        
        if ($input === "5"){
            return "Sales & Marketing";
        }
        
        
            
    }
?>