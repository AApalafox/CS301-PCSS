<?php
include("config/endpoints/db.php");
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} else {
	$days = "days";
	$time = "time";
	$sql = "SELECT value FROM hospital_schedule WHERE field_name IN ('$days','$time')";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$hospital_schedule = ($result->fetch_all(MYSQLI_ASSOC));
		$hospital_days = explode(",", ($hospital_schedule[0]['value']));
		$hospital_days = $hospital_days[0] . "-" . end($hospital_days);
		$hospital_time = $hospital_schedule[1];
		$hospital_time = $hospital_time['value'];
	} else {
		$error = "Error:" . $sql . "<br>" . $conn->error;
		$response = ["code" => 400, "error" => $error];
		echo json_encode($response);
	}
}
?>

<div class="row mb-5">

	<div class="bg-primary col p-4">
		<div class="card-body p-3 text-center">
			<h5 class="fs-2 text-light">
				<i class="fas fa-ambulance fa-2x text-light"></i>
				Emergency Hotline
			</h5>
			<p class="text-light">In case of emergency call the following number</p>
			<p class="fs-2 text-light">+63 45 125 0117</p>
		</div>
	</div>

	<div class="bg-primary col p-4">
		<div class="card-body">
			<h5 class="fs-2 text-light">
				<i class="fas fa-clock fa-1x text-light"></i>
				Opening Hours
			</h5>
			<p class="text-light">Our hospital is open for all during these hours</p>
		</div>
		<ul class="list-group list-group-flush mb-3">
			<a href="#">
				<li class="list-group-item">
					<div class="row">
						<div class="col" id="daysSchedule"> <?php echo "$hospital_days" ?> </div>
						<div class="col text-end" id="timeSchedule"> <?php echo "$hospital_time" ?> </div>
					</div>
				</li>
			</a>
			<!-- <a href="#">
				<li class="list-group-item">
					<div class="row">
						<div class="col">Sat-Sun</div>
						<div class="col text-end">8:00AM - 8:00PM</div>
					</div>
				</li>
			</a> -->
		</ul>
	</div>

</div>