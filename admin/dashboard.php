<?php
if (isset($_COOKIE["type"]))
	if ($_COOKIE["type"] == "patient")
		header("location:logout.php");

if (!isset($_COOKIE["id"])) {
	header("location:index.php");
}

include("endpoints/db.php");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} else {
	$sql = "SELECT CONCAT(p.fname, ' ', p.lname) AS title, s.schedule_dateTime AS start
  FROM schedule as s
  JOIN form as f
        on f.form_id = s.form_id
  JOIN patient as p
        on f.patient_id = p.patient_id";
	$result = $conn->query($sql);
	$phpschedules = $result->fetch_all(MYSQLI_ASSOC);
}
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="maximum-scale=1.0, width=device-width, initial-scale=1.0">
	<title>PCSS admin</title>

	<?php include 'assets/links.php'; ?>

</head>

<body>
	<div id="pageDashboard">
		<?php include 'templates/side-nav.php'; ?>
	</div>
	<div class="content">
		<?php include 'templates/header.php'; ?>
		<hr>

		<!-- page content -->
		<div class="ui">
			<div class="ui grid">
				<div class="ui sixteen column">
					<div id="calendar"></div>
				</div>
			</div>
		</div>
		<hr>
		<?php include 'templates/bottom-nav.php'; ?>
	</div>
</body>

</html>

<!-- script for displaying calendar -->
<script type="text/javascript">
	const d = new Date();
	const today = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();
	// console.log(today);

	var schedules = <?php echo json_encode($phpschedules) ?>;
	for (var i = 0; i < schedules.length; i++) {
		q = schedules[i].title;
		console.log(q);
		schedules[i].url = "consultation-list.php?q=" + q;
	}
	console.log(schedules);

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: today,
			navLinks: true, // can click day/week names to navigate views
			eventLimit: true, // allow "more" link when too many events
			events: schedules,
			eventBackgroundColor: 'rgba(123,202,255,0.1)'
		});

	});
</script>
