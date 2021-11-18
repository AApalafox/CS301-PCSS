<?php
include("../db.php");
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} else {
	$days = $_POST['days'];
	echo $days . 'endpoint';
	$sql = "UPDATE hospital_schedule SET 
		value = '$days'
		WHERE field_name='days'";
	if ($conn->query($sql) === TRUE) {
		$response = ["code" => 200];
	} else {
		$error = "Error:" . $sql . "<br>" . $conn->error;
		$response = ["code" => 400, "error" => $error];
	}
	echo json_encode($response);
}
