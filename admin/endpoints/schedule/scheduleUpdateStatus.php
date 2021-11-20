<?php 
	include("../db.php");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	else{
		$schedule_id= $_POST['schedule_id'];
		$status= $_POST['status'];

		$sql = "UPDATE schedule SET status='$status' WHERE schedule_id='$schedule_id'";
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