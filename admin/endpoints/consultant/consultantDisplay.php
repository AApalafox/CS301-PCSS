
	<?php
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} else {
		$sql = "SELECT * FROM consultant";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$consultants = ($result->fetch_all(MYSQLI_ASSOC));
			// print_r($consultants);
		} else {
			$error = "Error:" . $sql . "<br>" . $conn->error;
			$response = ["code" => 400, "error" => $error];
			echo json_encode($response);
		}
	}
	?>
	