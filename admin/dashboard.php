<?php
if(!isset($_COOKIE["id"])){
	header("location:index.php");
}
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
	<div class="main-container" id="mainContainer">
		<?php include 'templates/header.php'; ?>
		<hr>

		<!-- side nav -->
		<div class="container">
			<?php include 'templates/side-nav.php'; ?>
		</div>

		<!-- page content -->
		<div class="container">
			<div class="ui container">
				<div class="ui grid">
					<div class="ui sixteen column">
						<div id="calendar"></div>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<?php include 'templates/bottom-nav.php'; ?>
	</div>
</body>

</html>

<!-- script for displaying calendar -->
<script>
	const d = new Date();
	month = d.getMonth() + 1; //returns indexed 0, so plus 1 to offset
	const today = d.getFullYear() + '-' + month + '-' + d.getDate();
	console.log(today);
	$(document).ready(function() {

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},

			defaultDate: today,
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [{
					title: 'All Day Event',
					start: '2021-11-01'
				},
				{
					title: 'Long Event',
					start: '2021-11-07',
					end: '2021-11-10'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2021-11-09T16:00:00'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2021-11-16T16:00:00'
				},
				{
					title: 'Conference',
					start: '2021-11-11',
					end: '2021-11-13'
				},
				{
					title: 'Meeting',
					start: '2021-11-12T10:30:00',
					end: '2021-11-12T12:30:00'
				},
				{
					title: 'Lunch',
					start: '2021-11-12T12:00:00'
				},
				{
					title: 'Meeting',
					start: '2021-11-12T14:30:00'
				},
				{
					title: 'Happy Hour',
					start: '2021-11-12T17:30:00'
				},
				{
					title: 'Dinner',
					start: '2021-11-12T20:00:00'
				},
				{
					title: 'Birthday Party',
					start: '2021-11-13T07:00:00'
				},
				{
					title: 'Click for Google',
					url: 'https://google.com/',
					start: '2021-11-28'
				}
			]
		});

	});
</script>
