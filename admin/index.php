<?php

if(isset($_COOKIE["type"]))
	if($_COOKIE["type"]=="patient")
		header("location:logout.php");
	
if(isset($_COOKIE["id"])){
	header("location:dashboard.php");
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
	<div class="container">
		<?php include 'login.php'; ?>
	</div>
</body>

</html>
