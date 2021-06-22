<!-- Top Bar Starts -->
<ul class="nav justify-content-end">
  <p class="me-auto">Contact Us : help@foursqrconstructions.com | +91 XXXXXXXXXX </p>
  <li class="nav-item">
    <a class="nav-link" href="index.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">About Us</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Contact us</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Privacy Policy</a>
  </li>
</ul>

<!-- Top Bar Ends -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top py-3">
  <div class="container">
    <a class="navbar-brand px-3" href="#">Four Square</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse mr-auto justify-content-lg-end" id="navbarSupportedContent">
      <ul class="navbar-nav  mb-2 mb-lg-0">
        <li class="nav-item m-1">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#registerModal">
              Register
            </button>
        </li>
        <li class="nav-item m-1">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
              Login
            </button>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php require("components/login.inc.php"); ?>