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
			<label class="caption-body">Hospital hours</label>
			<div class="row">
				<div class="col">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="sunday">
						<label class="form-check-label" for="sunday">
							Sunday
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="monday" checked>
						<label class="form-check-label" for="monday">
							Monday
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="tuesday" checked>
						<label class="form-check-label" for="tuesday">
							Tuesday
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="wednesday" checked>
						<label class="form-check-label" for="wednesday">
							Wednesday
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="thursday" checked>
						<label class="form-check-label" for="thursday">
							Thursday
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="friday" checked>
						<label class="form-check-label" for="friday">
							Friday
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="saturday" checked>
						<label class="form-check-label" for="saturday">
							Saturday
						</label>
					</div>

					<button class="btn">Save</button>
				</div>
				<div class="col">
					Time input for schedule
				</div>
			</div>
		</div>

	</div>
</body>

</html>