<?php
//logout.php
setcookie("id", "", time()-3600);
setcookie("type", "", time()-3600);
setcookie("name", "", time()-3600);

header("location:index.php");

?>
