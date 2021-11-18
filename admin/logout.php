<?php
//logout.php
setcookie("id", "", time()-3600);

header("location:index.php");

?>