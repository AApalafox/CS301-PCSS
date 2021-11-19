<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PCSS Login</title>
	<?php include '../assets/links.php' ?>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body>
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form action="index.php" method="POST">
					<div class="modal-header justify-content-center">
						<a href="index.php">
							<h1 class="caption-body fw-bold mt-3">Login</h1>
						</a>
					</div>
					<div class="modal-body">
						<div class="container">
							<!-- <h4 class="mb-3 fw-bold  text-center">Login to your account</h4> -->
							<label for="email" class="form-label">Email address</label>
							<div class="input-group flex-nowrap mb-3">
								<input type="email" class="form-control" placeholder="Email" id="email" name="email" value="" required>
								<label class="input-group-text" id="addon-wrapping" for="email"><i class="fas fa-user fa-1x p-2"></i></label>
							</div>
							<label for="password" class="form-label">Password</label>
							<div class="input-group flex-nowrap mb-3">
								<input type="password" class="form-control" placeholder="Password" id="password" name="password" value="" required>
								<label class="input-group-text" id="addon-wrapping" for="password"><i class="fas fa-lock fa-1x p-2"></i></label>
							</div>
						</div>
					</div>
					<div class="modal-footer justify-content-between mx-3 my-2">
						<a href="register.php" class="text-decoration-underline fst-italic">Register new Account</a>
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