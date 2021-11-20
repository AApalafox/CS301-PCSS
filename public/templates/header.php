<!-- add the scroll listener -->
<script src="assets/js/scroll.js"></script>

<nav class="navbar navbar-expand-lg top-nav">
  <div class="container-fluid content-container">
    <a class="brand" href="#">
      <img src="assets/img/umbrella-icon-blue.png" alt="" width="45" height="45" class="d-inline-block align-text-top">
      Umbrella Corp
    </a>
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-4">
        <li class="brand-text mx-4"><i class="fas fa-at"></i>umbrellacorp@email.com</li>
        <li class="brand-text mx-4"><i class="fas fa-phone"></i>+63 45 125 0117</li>
        <li class="brand-text mx-4"><i class="fas fa-map-marker-alt"></i></i>Elliptical Rd, Diliman, Quezon City, Metro Manila</li>
      </ul>
    </div>
  </div>
</nav>

<nav id="navbar_top" class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid content-container">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon text-dark"></span>
    </button>


    <div class="collapse navbar-collapse" id="main_nav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link active" href="#"> Home </a></li>
        <li class="nav-item"><a class="nav-link" href="#top"> About Us </a></li>
        <li class="nav-item"><a class="nav-link" href="#services"> Services </a></li>
        <li class="nav-item"><a class="nav-link" href="#doctors"> Doctors </a></li>
        <li class="nav-item"><a class="nav-link" href="#department"> Departments </a></li>
        <li class="nav-item"><a class="nav-link" href="#contact"> Contact </a></li>
      </ul>

    </div> <!-- navbar-collapse.// -->
    <div class="ms-auto">
      <button type="button" class="btn" id="scheduleBtn">Schedule Consultation</button>
    </div>
    <div class="dropdown ms-auto" style="visibility:hidden" id="accountLogout">
      <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <p class="text-capitalize d-inline text-light">Account</p>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="components/logout.php">Logout</a></li>
      </ul>
    </div>

  </div> <!-- container-fluid.// -->
</nav>

<script>
  if (Cookies.get("type")) {
    $('#accountLogout').css("visibility", "visible");
  } else {
    $('#accountLogout').css("visibility", "hidden");
  }
  $("#scheduleBtn").click(function() {
    if (!(Cookies.get("type"))) {
      $('#loginModal').modal('show');
    } else $('#addScheduleModal').modal('show');
  });
</script>