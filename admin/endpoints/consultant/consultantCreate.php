<?php 
	//create
	include("../db.php");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	else{
		$fname= $_POST['fname'];
		$lname= $_POST['lname'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$job=$_POST['job'];

		$sql = "INSERT INTO consultant (fname, lname, email, password, job)
		 VALUES ('$fname', '$lname', '$email', '$password', '$job')";
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
