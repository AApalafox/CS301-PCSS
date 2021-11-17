<?php 
	include("../db.php");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	else{
		$schedule_id= $_POST['schedule_id'];
		$schedule_date=$_POST['schedule_date'];
		$schedule_time=$_POST['schedule_time'];

		$sql = "UPDATE schedule SET schedule_time='$schedule_time', schedule_date='$schedule_date' WHERE schedule_id='$schedule_id'";
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