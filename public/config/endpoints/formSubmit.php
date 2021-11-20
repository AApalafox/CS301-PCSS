<?php 
	include("db.php");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	else{
		$condition = $_POST['condition'];
		$reason = $_POST['reason'];
		$form_dateTime = $_POST['form_dateTime'];
		$patient_id = $_POST['patient_id'];

		$sql = "INSERT INTO `form`(`condition`, `reason`, `status`, `form_dateTime`, `patient_id`) 
		VALUES ('$condition','$reason','pending','$form_dateTime','$patient_id');";
		if ($conn -> query($sql) === TRUE) {
			$last_id = $conn->insert_id;
			$sql = "INSERT INTO `schedule`(`schedule_dateTime`, `status`, `form_id`) 
				VALUES ('$form_dateTime', 'Pending','$last_id');";

			if ($conn -> query($sql) === TRUE) {
				$response = ["code"=>200];
			}
			else{
				$error = "Error:" . $sql . "<br>" . $conn->error;
				$response = ["code"=>400, "error" =>$error];
			}
		}
		else{
			$error = "Error:" . $sql . "<br>" . $conn->error;
			$response = ["code"=>400, "error" =>$error];
		}
		echo json_encode($response);
	}

?>
