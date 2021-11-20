<?php 
	include("../db.php");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	else{
		$patient_id= $_POST['patient_id'];
		$fname= $_POST['fname'];
		$lname= $_POST['lname'];
		$birthdate=$_POST['birthdate'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$phone=$_POST['phone'];

		$sql = "UPDATE patient SET 
		fname='$fname', 
		lname='$lname', 
		birthdate='$birthdate', 
		email='$email', 
		password='$password',
		phone='$phone' 
		WHERE patient_id='$patient_id'";
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