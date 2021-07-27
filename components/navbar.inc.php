<!-- Top Bar Starts -->
<section>
  <div class="container-fluid"> 
    <div class="row">
      <div class="col-lg-6 d-flex justify-content-lg-start justify-content-center">
        <p class="mt-2 text-center">Contact Us : help@foursqrconstructions.com | +91 XXXXXXXXXX</p>
      </div>

    <?php
    session_start();
    if(isset($_SESSION['is_login']) )
    {
      echo '
      <div class="col-lg-6">
      <ul class="nav justify-content-lg-end justify-content-center">
      <li class="nav-item m-1">'?>
      <?php
      if(isset($_SESSION['buyerEmail']) )
      {
        echo'<a href="buyer/index.php"
        <button type="button" class="btn btn-success" >
            My Profile
          </button></a>';

      }
      else if(isset($_SESSION['sellerEmail']) )
      {
        echo'<a href="seller/index.php"
        <button type="button" class="btn btn-success" >
            My Profile
          </button></a>';
      }
      else
      {
        echo'<a href="admin/index.php"
        <button type="button" class="btn btn-success" >
            My Profile
          </button></a>';
      }
      ?>
      <?php
      echo '
        </li>
        <li class="nav-item m-1">
        <a href="logout.php"
            <button type="button" class="btn btn-primary" >
              Log Out
            </button></a>
        </li>
        
      </ul>
    </div>

  ';
    }
    else{
        echo '      <div class="col-lg-6">
        <ul class="nav justify-content-lg-end justify-content-center">
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
      </div>';
    }
    ?>


    </div>
  </div>
</section>

<section>
  <!-- Top Bar Ends -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top py-3">
    <div class="container">
      <a class="navbar-brand px-3" href="#">Four Square</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse mr-auto justify-content-lg-end" id="navbarSupportedContent">
        <ul class="navbar-nav  mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="privacypolicy.php">Privacy Policy</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</section>


<?php require("components/login.inc.php"); ?>