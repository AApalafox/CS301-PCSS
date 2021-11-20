<?php
//logout.php
setcookie('id', null, -1, '/');
setcookie('type', null, -1, '/'); 

header("location:../index.php");

?>