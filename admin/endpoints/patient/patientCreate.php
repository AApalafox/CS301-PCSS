<?php 
	include("../db.php");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	else{
		$fname= $_POST['fname'];
		$lname= $_POST['lname'];
		$birthdate=$_POST['birthdate'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$phone=$_POST['phone'];

		$sql = "INSERT INTO patient (fname, lname, birthdate, email, password, phone)
		 VALUES ('$fname', '$lname', '$birthdate', '$email', '$password', '$phone')";
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