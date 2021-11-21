<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content='maximum-scale=1.0, initial-scale=1.0, width=device-width' name='viewport'>

	<title>PCSS</title>

	<?php include 'assets/links.php'; ?>
	
</head>

<body id="bodyContainer">
	<?php include 'templates/header.php'; ?>

	<?php include 'components/schedule-consultation-modal.php'; ?>
	
	<?php include 'components/medical-records.php'; ?>
	
	<?php include 'components/login.php'; ?>
	
	<div class="position-relative component">
		<?php include 'components/img-carousel.php'; ?>
	</div>

	<div class="content-container">
		<?php include 'components/schedule.php'; ?>
	</div>

	<div class="content-container component" id="services">
		<div class="text-center mb-2 ">
				<h2>Our Services</h2>
		</div>
		<?php include 'components/services-cards.php' ?>
	</div>

	<div class="container component" id="doctors">
		<div class="text-center mb-4 brand ">
				<h2>Meet your Trustworthy Doctors</h2>
		</div>
		<?php include 'components/doctor-cards.php'; ?>
	</div>
	
	<div class="content-container component" id="department">
		<div class="text-center mb-4 brand ">
				<h2>Departments</h2>
		</div>
		<?php include 'components/departments-accordion.php'; ?>
	</div>
	<!--
	<div class="wide-container component">
		<?php //include 'components/testimonies-carousel.php' ?>
	</div>
	-->
	<div class="container" id="contact">
		<?php include 'components/schedule.php'; ?>
	</div>
	
	<?php include 'templates/footer.php'; ?>
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->
</body>
</html>
