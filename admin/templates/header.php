<nav id="navbar_top" class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid content-container">
    <a class="brand mt-3" href="#">
      <img src="assets/img/umbrella-icon-blue.png" alt="" width="40" height="40" class="d-inline-block align-text-top">
    </a>
    <div class="collapse navbar-collapse" id="main_nav">
      <ul class="navbar-nav mt-3">
        <li class="nav-item">
          <a class="brand mt-3" href="#">
            Umbrella Corp
          </a>
        </li>
      </ul>
    </div> <!-- navbar-collapse.// -->
    <div class="d-flex dropdown mt-2">
      <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-user"></i>
        <p class="text-capitalize d-inline text-light"><?php echo $_COOKIE["name"]; ?></p>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="user-list.php?q='<?php echo $_COOKIE["name"] ?>'">Account</a></li>
        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div> <!-- container-fluid.// -->
</nav>