<?php 
	include("../db.php");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	else{
		$form_id= $_POST['form_id'];

		$sql = "DELETE FROM form WHERE form_id='$form_id'";
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