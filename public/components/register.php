<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PCSS Register</title>
	<?php include '../assets/links.php' ?>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body>
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form action="index.php" method="POST" class="needs-validation" novalidate>
					<div class="modal-header justify-content-center">
						<a href="index.php">
							<h1 class="caption-body fw-bold mt-3">Register</h1>
						</a>
					</div>
					<div class="modal-body">
						<div class="container">
							<div class="row">
								<div class="col">
									<label for="validationCustom01" class="form-label">First name</label>
									<input type="text" class="form-control" id="fname" name="fname" value="Mark" required>
								</div>
								<div class="col">
									<label for="validationCustom02" class="form-label">Last name</label>
									<input type="text" class="form-control" id="lname" name="lname" value="Otto" required>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<label for="validationCustom01" class="form-label">Birthday</label>
									<input type="text" class="form-control" id="bday" name="bday" value="Mark" required>
								</div>
								<div class="col">
									<label for="validationCustom02" class="form-label">Phone</label>
									<input type="text" class="form-control" id="phone" name="phone" value="Otto" required>
								</div>
							</div>
							<label for="email" class="form-label">Email address</label>
							<div class="input-group flex-nowrap mb-1">
								<input type="email" class="form-control" placeholder="Email" id="email" name="email" value="" required>
								<label class="input-group-text" id="addon-wrapping" for="email"><i class="fas fa-user p-2"></i></label>
							</div>
							<label for="password" class="form-label">Password</label>
							<div class="input-group flex-nowrap mb-1">
								<input type="password" class="form-control" placeholder="Password" id="password" name="password" value="" required>
								<label class="input-group-text" id="addon-wrapping" for="password"><i class="fas fa-lock  p-2"></i></label>
							</div>
						</div>
					</div>
					<div class="modal-footer justify-content-between mx-3 my-2">
						<a href="login.php" class="text-decoration-underline fst-italic">Login to my account</a>
						<button type="submit" class="btn btnSquare" name="login">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>


</body>

</html>
<script>
	$(document).ready(function() {
		$("#staticBackdrop").modal('show');
	});
</script>