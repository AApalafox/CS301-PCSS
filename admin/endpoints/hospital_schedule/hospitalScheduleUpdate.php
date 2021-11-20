<?php
include("../db.php");
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} else {
	$days = $_POST['days'];
	$time = $_POST['time'];
	echo $days .$time. 'endpoint';
	$sql = "UPDATE hospital_schedule SET value = CASE WHEN field_name='days' THEN '$days' 
	ELSE '$time' END
	WHERE field_name IN ('days','time')";
	if ($conn->query($sql) === TRUE) {
		$response = ["code" => 200];
	} else {
		$error = "Error:" . $sql . "<br>" . $conn->error;
		$response = ["code" => 400, "error" => $error];
	}
	echo json_encode($response);
}
