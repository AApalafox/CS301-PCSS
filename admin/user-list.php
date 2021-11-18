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
			<label class="caption-body">User List</label>
			<!-- Display the list below -->
			<div id="displayConsultant"></div>
		</div>
		<hr>
		<?php include 'templates/bottom-nav.php'; ?>
	</div>
</body>

</html>

<script>
	$(document).ready(displayConsultantList());

	function displayConsultantList() {
		var str = "all"
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("displayConsultant").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "handlers/displayConsultantHandler.php?q=" + str, true);
		xmlhttp.send();
	}
</script>