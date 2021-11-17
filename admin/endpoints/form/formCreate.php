<?php 
	include("../db.php");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	else{
		$condition= $_POST['condition'];
		$allergies= $_POST['allergies'];
		$reason=$_POST['reason'];
		//status to be followed on approval/denial
		//remarks to be followed on denial/schedule completion
		$form_date=$_POST['form_date'];
		$form_time=$_POST['form_time'];
		$patient_id=$_POST['patient_id'];
		//consultant_id to be followed on approval

		$sql = "INSERT INTO form (condition, allergies, reason, form_date, form_time, patient_id)
		 VALUES ('$condition', '$allergies', '$reason', '$form_date', '$form_time', '$patient_id')";
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