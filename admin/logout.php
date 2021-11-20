<?php
//logout.php
if(isset($_COOKIES['id']))
	setcookie("id", "", time()-3600);

if(isset($_COOKIES['type']))
setcookie("type", "", time()-3600);

if(isset($_COOKIES['name']))
setcookie("name", "", time()-3600);

header("location:index.php");

?>
