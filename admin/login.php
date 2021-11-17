<?php
include("endpoints/db.php");
$message = '';
if(isset($_COOKIE["id"])){
	header("location:dashboard.php");
}
if(isset($_POST["login"])) {
	$email = $_POST['email'];
	$sql = "SELECT * FROM consultant WHERE email = '$email'";
	$list = $conn -> query($sql);
	if ($list->num_rows > 0) {
		$result = $list->fetch_all(MYSQLI_ASSOC);
		foreach($result as $row){
			if($_POST['password']==$row['password']){
				setcookie("id", $row["consultant_id"], time()+3600);
				header("location:dashboard.php");
			}
			else{
				$message = '<div class="alert alert-danger">Invalid Email or Password</div>';
			}
		}
	}
	else{
		$message = '<div class="alert alert-danger">Invalid Email or Password</div>';
	}
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
						<span><?php echo $message; ?></span>
						<div class="mb-3">
							<label for="InputEmail1" class="form-label">Email address</label>
							<input type="email" class="form-control" id="email" name="email" value="" required>
						</div>
						<div class="mb-3">
							<label for="InputPassword1" class="form-label">Password</label>
							<input type="password" class="form-control" id="password" name="password" value="" required>
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
