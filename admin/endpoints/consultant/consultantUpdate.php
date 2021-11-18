<?php 
	//update
	include("../db.php");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	else{
		$consultant_id= $_POST['consultant_id'];
		$fname= $_POST['fname'];
		$lname= $_POST['lname'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$job=$_POST['job'];

		$sql = "UPDATE consultant SET 
		fname='$fname', 
		lname='$lname', 
		email='$email', 
		password='$password',
		job='$job' 
		WHERE consultant_id='$consultant_id'";
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
