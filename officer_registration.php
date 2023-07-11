<?php
    include_once "database_connection.php";

    try {
        $database = new Database();
        $con = $database->openConnection();

		// File upload path - First give the directory
        $targetDir = "upload/";
		$fileName = basename($_FILES["file"]["name"]);
		$targetFilePath = $targetDir . $fileName;
		$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		
		//print_r($targetFilePath);	
		
		//Check if the button register is pressed
        if(isset($_POST['btn_register']) ) {
			//If file is available to upload
			if(!empty($_FILES["file"]["name"])){
				echo "<br>In File upload";
					// Allow certain file formats
					//$allowTypes = array('jpg','png','jpeg','gif','pdf');
					//echo "<br>".in_array($fileType, $allowTypes);
					//if(in_array($fileType, $allowTypes)){
						echo "<br>In File type";
						// Upload file to server
						//Check if file uploaded to target directory from temp storage
						if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
							echo "<br>File uploaded on server";							
						}
						else {
							echo "<br>File upload failed";
							exit;	
						}
					//}
			}
            if(isset($_POST['btn_register']) ) {
				
			$insert_query = "INSERT INTO officer(officer_name, officer_email, officer_dob, officer_gender, officer_address, officer_phone_no,
			 officer_date_of_joining, station_id, officer_type_id, image_url, officer_password) 
					VALUES 
					(:officer_name, :officer_email, :officer_dob, :officer_gender, :officer_address,:officer_phone_no,
			 :officer_date_of_joining, :station_id, :officer_type_id, :image_url, :officer_password)";
			$query_prepare = $con->prepare($insert_query);
			
			$data =  [
			':officer_name'=>$_POST['officer_name'],
			':officer_email'=>$_POST['officer_email'],
			':officer_dob'=>$_POST['officer_dob'],
			':officer_gender'=>$_POST['officer_gender'],
			':officer_address'=>$_POST['officer_address'],
			':officer_phone_no'=>$_POST['officer_phone_no'],
			':officer_date_of_joining'=>$_POST['officer_date_of_joining'],
			':station_id'=>$_POST['station_id'],
			':officer_type_id'=>$_POST['officer_type_id'],
			// ':case_in_hand'=>$_POST['case_in_hand'],
			// ':solved_case'=>$_POST['solved_case'],
			':officer_password'=>md5($_POST['officer_password']),
			':image_url'=>$targetFilePath	   
			];
			$query_run = $query_prepare->execute($data);
			if($query_run) {				
				header('location:officer.php');			
			}
			else{
				echo "<br>Error in insertion";
			}	
		}
        $database->closeConnection();
    }
    } 
    catch (PDOException $e) 
    {
        $e->getMessage();
	} 
 
?>