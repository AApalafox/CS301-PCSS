<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	<a href="dashboard.php"><i class="fas fa-columns fa-1x"></i>Dashboard</a>
	<a href="consultation-list.php"><i class="fas fa-calendar-alt fa-1x"></i>Consultations</a>
	<a href="hospital-hours.php"><i class="fas fa-clock fa-1x"></i>Hospital</a>
	<a href="notification.php"><i class="fas fa-bell fa-1x"></i>Notifications</a>
	<a href="user-list.php"><i class="fas fa-users fa-1x"></i>Users</a>
</div>

<!-- Use any element to open the sidenav -->

<button onclick="openNav()" id="btnMenu" class="btn btnSquare" style="display: none;"><i class="fas fa-bars fa-1x"></i></i></button>

<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div id="main">

</div>

<script>
	//adds ID for all sideNav options
	//this should be update if ever new page is added here
	const pageNames = ["Dashboard","Consultations","Hospital","Notifications", "Users"]
	for(let i = 0; i < pageNames.length; i++){
		//this x is for convenience only
		let x = $(".sidenav a:eq("+(i+1)+")");

		//here adds ID on the sideNav options
		x.attr('id', "sidenav"+pageNames[0]);

		//adds highlighter depending on the current page
		if($("#mySidenav").parent().attr('id').substring(4)==pageNames[i]){
			x.attr('class', "bg-light");
		}
	}

	
	/* Set the width of the side navigation to 250px */
	function openNav() {
		document.getElementById("mySidenav").style.width = "16%";
		document.getElementById("mainContainer").style.marginLeft = "18%";
		// document.getElementById("main").style.marginLeft = "250px";
		var x = document.getElementById("btnMenu");
		if (x.style.display === "none") {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}
	}

	/* Set the width of the side navigation to 0 */
	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
		document.getElementById("mainContainer").style.marginLeft = "0px";
		// document.getElementById("main").style.marginLeft = "0";
		var x = document.getElementById("btnMenu");
		if (x.style.display === "none") {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}
	}
</script>
