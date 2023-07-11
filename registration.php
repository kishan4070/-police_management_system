<?php
    include_once "database_connection.php";

    try {
        $database = new Database();
        $con = $database->openConnection();

		// File upload path - First give the directory
		$targetDir = "upload/";
		//Get the file name
		$fileName = basename($_FILES["file"]["name"]);
		
		//Create the full path of the file
		$targetFilePath = $targetDir . $fileName;
		
		//Check the extension of the file to be uploaded
		$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		//print_r($targetFilePath);	
		
		//Check if the button register is pressed
        if(isset($_POST['btn_register']) ) {
			//If file is available to upload
			if(!empty($_FILES["file"]["name"])){
				//echo "<br>In File upload";
					// Allow certain file formats
					//$allowTypes = array('jpg','png','jpeg','gif','pdf');
					//echo "<br>".in_array($fileType, $allowTypes);
					//if(in_array($fileType, $allowTypes)){
						//echo "<br>In File type";
						// Upload file to server
						//Check if file uploaded to target directory from temp storage
						if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
							//echo "<br>File uploaded on server";							
						}
						else {
							//echo "<br>File upload failed";
							exit;	
						}
					//}
			}
			//echo "Email already exist.!";
            if(isset($_POST['btn_register']) ) {
						
			$insert_query = "INSERT INTO user(user_name, user_image, user_email, user_dob, user_gender, user_address,
			 user_phone_no, user_password) 
					VALUES 
					(:user_name, :user_image, :user_email, :user_dob, :user_gender,:user_address,
			 :user_phone_no, :user_password)";
			$query_prepare = $con->prepare($insert_query);
			
			$data =  [
			':user_name'=>$_POST['user_name'],
			':user_email'=>$_POST['user_email'],
			':user_dob'=>$_POST['user_dob'],
			':user_gender'=>$_POST['user_gender'],
			':user_address'=>$_POST['user_address'],
			':user_phone_no'=>$_POST['user_phone_no'],
			':user_password'=>$_POST['user_password'],
			':user_image'=>$targetFilePath	    
			];
			$query_run = $query_prepare->execute($data);
			if($query_run) {				
				header('location:index.html');			
			}
			else{
				echo "<br>Error in insertion";
			}	
		}
		else{
			header('location:index.html');
		}
		
        $database->closeConnection();
		
    }
    } 
    catch (PDOException $e) 
    {
        $e->getMessage();
	} 
 
?>