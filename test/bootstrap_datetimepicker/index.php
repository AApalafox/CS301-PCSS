<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Bootstrap Datetimepicker - Add Date-Time Picker to Input Field by SemicolonWorld</title>
	<!-- Minified Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Minified JS library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Minified Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<script src="js/bootstrap-datetimepicker.min.js"></script>

	<style>
		.form-control {
			width: 200px;
			margin-bottom: 10px;
		}
	</style>
</head>

<body>
	<div class="container">
		<h1>Datetime Picker</h1>
		<input size="16" type="text" class="form-control" id="datetime" readonly>

		<script type="text/javascript">
			$("#datetime").datetimepicker({
				format: 'yyyy-mm-dd hh:ii'
			});
		</script>

		<h1>Datetime Picker Auto Close</h1>
		<input size="16" type="text" class="form-control" id="datetime2" readonly>

		<script type="text/javascript">
			$("#datetime2").datetimepicker({
				format: 'yyyy-mm-dd hh:ii',
				autoclose: true
			});
		</script>

		<h1>Datetime Picker with Today Link</h1>
		<input size="16" type="text" class="form-control" id="datetime3" readonly>

		<script type="text/javascript">
			$("#datetime3").datetimepicker({
				format: 'yyyy-mm-dd hh:ii',
				autoclose: true,
				todayBtn: true
			});
		</script>

		<h1>Inline Datetime Picker</h1>
		<div id="datetime4"></div>
		<script type="text/javascript">
			$("#datetime4").datetimepicker();
		</script>

		<?php
		if (isset($_POST['submit']) && !empty($_POST['event_name']) && !empty($_POST['event_datetime'])) {
			//db details
			$dbHost = 'localhost';
			$dbUsername = 'root';
			$dbPassword = '';
			$dbName = 'semicolan';

			//Connect and select the database
			$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

			//Insert datetime into the database
			$name = $db->real_escape_string($_POST['event_name']);
			$datetime = $db->real_escape_string($_POST['event_datetime']);
			$insert = $db->query("INSERT INTO events (name,datetime) VALUES ('" . $name . "', '" . $datetime . "')");

			//Insert status
			if ($insert) {
				echo 'Event data inserted successfully. Event ID: ' . $db->insert_id;
			} else {
				echo 'Failed to insert event data.';
			}
		}
		?>
		<h1>Submit & Insert Datetime into the Database</h1>
		<form method="post" action="">
			Event: <input type="text" name="event_name" class="form-control">
			Date & Time: <input size="16" type="text" name="event_datetime" class="form-control" id="form_datetime" readonly>
			<input type="submit" name="submit" class="btn button btn-success" value="SUBMIT" />
		</form>
		<script type="text/javascript">
			$(function() {
				var today = new Date();
				var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
				var time = today.getHours() + ":" + today.getMinutes();
				var dateTime = date + ' ' + time;
				$("#form_datetime").datetimepicker({
					format: 'yyyy-mm-dd hh:ii',
					autoclose: true,
					todayBtn: true,
					startDate: dateTime
				});
			});
		</script>
	</div>
</body>

</html>