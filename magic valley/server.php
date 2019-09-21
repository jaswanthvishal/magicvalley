<?php

	    $server = "localhost:3306";
		$username="root";
		$password="";
       
		$cn = $_POST["comment_name"];
		$cct = $_POST["comment_content"];
    
        try
		{
			if($cn!='' && $cct!=''){
		    $conn = new PDO("mysql:host=$server;dbname=testing", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query="insert into tbl_comment (comment_sender_name,comment)  values('" . $cn . "','" . $cct . "')";
			$result = $conn->exec($query);
		    header("Location:coustomer.php");
			}
			else{
				echo"connectioned failed";
				header("Location:coustomer.php");
			}
		   
             
	}
        catch(PDOException $e)
        {

            echo "Err: ". $e->getMessage();
        }
    
	
?>
