<!-- add the scroll listener -->
<script src="assets/js/scroll.js"></script>

<nav class="navbar navbar-expand-lg top-nav">
  <div class="container-fluid">
    <a class="brand" href="#">
      <img src="assets/img/umbrella-icon-blue.png" alt="" width="45" height="45" class="d-inline-block align-text-top">
      Umbrella Corp
    </a>
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="navbar" id="navbarNav">
      <ul class="navbar-nav mx-4">
        <!-- <li class="brand-text mx-4"><i class="fas fa-at"></i>umbrellacorp@email.com</li>
        <li class="brand-text mx-4"><i class="fas fa-phone"></i>+63 45 125 0117</li> -->
        <li class="brand-text mx-4">Patient Consultation Scheduling System</li>
        <!-- <li class="d-flex">
          <a href="#"><i class="fas fa-user-circle fa-3x social account"></i></a>
        </li> -->
        <div class="dropdown">
          <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user"></i>
            <p class="text-capitalize d-inline text-light"><?php echo $_COOKIE["name"]; ?></p>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="user-list.php">Account</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </div>
      </ul>
    </div>
  </div>
</nav>