
<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	<a href="dashboard.php">Dashboard</a>
	<a href="consultation-list.php">Consultations</a>
	<a href="hospital-hours.php">Hospital Hours</a>
	<a href="user-list.php">Users</a>
</div>

<!-- Use any element to open the sidenav -->
<span onclick="openNav()">MENU</i></span>

<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div id="main">

</div>

<script>
	/* Set the width of the side navigation to 250px */
	function openNav() {
		document.getElementById("mySidenav").style.width = "20%";
		document.getElementById("mainContainer").style.marginLeft = "20%";
		document.getElementById("main").style.marginLeft = "250px";
	}

	/* Set the width of the side navigation to 0 */
	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
		document.getElementById("mainContainer").style.marginLeft = "0px";
		document.getElementById("main").style.marginLeft = "0";
	}
</script>