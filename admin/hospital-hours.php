<!DOCTYPE html>
<html lang="en">
<?php

if (isset($_COOKIE["type"]))
	if ($_COOKIE["type"] == "patient")
		header("location:logout.php");

if (!isset($_COOKIE["id"])) {
	header("location:index.php");
}
?>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="maximum-scale=1.0, width=device-width, initial-scale=1.0">
	<title>PCSS admin</title>

	<?php include 'assets/links.php';

	include("endpoints/db.php");

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} else {
		$sql = "SELECT * FROM hospital_schedule";
		$result = $conn->query($sql);
		$hospital_schedule = $result->fetch_all(MYSQLI_ASSOC);
	}
	mysqli_close($conn);

	?>

</head>

<body>
	<div class="" id="pageHospital">
		<?php include 'templates/side-nav.php'; ?>
	</div>
	<div class="content" id="mainContainer">
		<?php include 'templates/header.php'; ?>
		<hr>

		<!-- side nav -->
		<!-- please add id here if any new page will be made-->


		<!-- page content -->
		<div class="container">
			<label class="caption-body">Hospital Schedule</label>
			<div class="row">
				<div class="col">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="sunday" id="sunday">
						<label class="form-check-label" for="sunday">
							Sunday
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="monday" id="monday">
						<label class="form-check-label" for="monday">
							Monday
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="tuesday" id="tuesday">
						<label class="form-check-label" for="tuesday">
							Tuesday
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="wednesday" id="wednesday">
						<label class="form-check-label" for="wednesday">
							Wednesday
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="thursday" id="thursday">
						<label class="form-check-label" for="thursday">
							Thursday
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="friday" id="friday">
						<label class="form-check-label" for="friday">
							Friday
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="saturday" id="saturday">
						<label class="form-check-label" for="saturday">
							Saturday
						</label>
					</div>

					<button class="btn btnSquare mb-3" onclick="saveSchedule()">Save</button>


				</div>
				<div class="col">
					Hospital Hours
					<div class="my-3 row">
						<label for="opening" class="col-sm-2 col-form-label">Opening</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="opening" value="">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="closing" class="col-sm-2 col-form-label">Closing</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="closing" value="">
						</div>
					</div>
				</div>
				<hr>
				<p id="daysModified"></p>
			</div>
		</div>
		<hr>
		<?php include 'templates/bottom-nav.php'; ?>
	</div>
</body>

</html>

<script>
	$(document).ready(laodSchedule());

	function laodSchedule() {
		var hospital_schedule = <?php echo json_encode($hospital_schedule) ?>;
		// console.log(hospital_schedule);
		days = hospital_schedule[0]['value'];
		days = days.split(",");
		daysModified = hospital_schedule[0]['date_created'];
		document.getElementById("daysModified").innerHTML = 'Last modified: ' + daysModified;
		// console.log(days, daysModified);
		time = hospital_schedule[1]['value'];
		time = time.split(" - ");
		// console.log(time);
		document.getElementById("opening").value = time[0];
		document.getElementById("closing").value = time[1];
		// console.log(time, timeModified);

		for (var i = 0; i < days.length; i++) {
			document.getElementById(days[i]).checked = true;
		}
	}

	function saveSchedule() {
		days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
		inputDays = [];
		for (var i = 0; i < days.length; i++) {
			if (document.getElementById(days[i]).checked) {
				inputDays.push(document.getElementById(days[i]).value);
			}
		}
		inputDays = inputDays.toString();
		inputTime = document.getElementById("opening").value + " - " + document.getElementById("closing").value;
		console.log(inputDays, inputTime);
		$.ajax({
			'url': "endpoints/hospital_schedule/hospitalScheduleUpdate.php",
			'type': "POST",
			'data': {
				"days": inputDays,
				"time": inputTime
			},
			success: function(response) {
				window.location.reload();
				//di ko na nilagay sa baba, nag eerror json parse
				// response = JSON.parse(response);
				// if (response.code == 200) {

				// 	window.location.reload()
				// } else if (response.code == 400) {
				// 	console.log(response.error);

				// } else {
				// 	console.log(response.code);
				// }
			}

		});
	}
</script>