<?php 
	//create
	include("../db.php");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	else{
		$schedule_dateTime=$_POST['schedule_dateTime'];
		$form_id=$_POST['form_id'];

		$sql = "INSERT INTO schedule (schedule_dateTime, form_id)
		 VALUES ('$schedule_dateTime', '$form_id')";
		if ($conn -> query($sql) === TRUE) {
			$response = ["code"=>200];
		}
		else{
			$error = "Error:" . $sql . "<br>" . $conn->error;
			$response = ["code"=>400, "error" => $error];
		}
		echo json_encode($response);
	}

?>
