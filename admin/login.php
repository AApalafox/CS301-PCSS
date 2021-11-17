<?php

$username = $password = "";

if (isset($_POST["login"])) {
	header('Location: dashboard.php');
}

?>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form action="index.php" method="POST">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
					<!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
				</div>
				<div class="modal-body">
					<div class="container">
						<h2 class="my-3 caption-body">Login</h2>

						<div class="mb-3">
							<label for="InputEmail1" class="form-label">Email address</label>
							<input type="email" class="form-control" id="InputEmail1" name="username" value="<?php echo $username ?>">
						</div>
						<div class="mb-3">
							<label for="InputPassword1" class="form-label">Password</label>
							<input type="password" class="form-control" id="InputPassword1" name="password" value="<?php echo $password ?>">
						</div>


					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn" name="login">Login</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$("#staticBackdrop").modal('show');
	});
</script>