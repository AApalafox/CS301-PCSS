<?php 
	include("db.php");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	else{
		$email = $_POST['email'];
		$password = $_POST['password'];
		$sql = "SELECT patient_id, CONCAT(fname, ' ', lname) AS name FROM patient WHERE email='$email' AND password='$password'";
		$result = $conn -> query($sql);

		if ($result->num_rows > 0)
			echo json_encode($result->fetch_all(MYSQLI_ASSOC));
	
		else{
			$error = "Error:" . $sql . "<br>" . $conn->error;
			$response = ["code"=>400, "error" =>$error];
			echo json_encode($response);
		}
	}

?>
