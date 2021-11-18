<?php 
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	else{
		$sql = "SELECT * FROM schedule";
		$result = $conn -> query($sql);

		if ($result->num_rows > 0) {
			$schedules = $result->fetch_all(MYSQLI_ASSOC);
			// var_dump($schedules);
		}
		else{
			$error = "Error:" . $sql . "<br>" . $conn->error;
			$response = ["code"=>400, "error" =>$error];
			echo json_encode($response);
		}
	}

?>