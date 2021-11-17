<?php

$username = $password = "";

if(isset($_POST["login"])){
	header('Location: dashboard.php');
}

?>
<div class="container test">
	<h2 class="my-3 caption-body">Login</h2>
	<form action="index.php" method="POST">
		<div class="mb-3">
			<label for="InputEmail1" class="form-label">Email address</label>
			<input type="email" class="form-control" id="InputEmail1" name="username" value="<?php echo $username ?>">
		</div>
		<div class="mb-3">
			<label for="InputPassword1" class="form-label">Password</label>
			<input type="password" class="form-control" id="InputPassword1" name="password" value="<?php echo $password ?>">
		</div>
		<button type="submit" class="btn" name="login">Login</button>
	</form>
</div>