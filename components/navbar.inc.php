<!-- Top Bar Starts -->

  <div class="container-fluid"> 
    <div class="row">
      <div class="col-lg-6 d-flex justify-content-lg-start justify-content-center">
        <p class="mt-2 text-center">Contact Us : help@foursquareconstructions.com | +91 XXXXXXXXXX</p>
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
        echo'<li class="nav-item m-1">
        <a href="buyer/index.php"
        <button type="button" class="btn btn-success" >
            My Profile
          </button></a></li>';
          echo'<li class="nav-item m-1">
          <a href="mycart.php"
        <button type="button" class="btn btn-success" >
            My Cart
          </button></a></li>';
          include_once('dbconnection.php');
          $sql="SELECT bu_id from buyer WHERE bu_email = '{$_SESSION['buyerEmail']}'";
          // echo $sql;
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
          $bu_id=$row['bu_id'];

      }
      else if(isset($_SESSION['sellerEmail']) )
      {
        echo'<li class="nav-item m-1">
        <a href="seller/index.php"
        <button type="button" class="btn btn-success" >
            My Profile
          </button></a></li>';
      }
      else
      {
        echo'<li class="nav-item m-1">
        <a href="admin/index.php"
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
  <!-- Top Bar Ends -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-md-top py-3">
    <div class="container">
      <a class="navbar-brand px-3" href="index.php">Four Square</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse mr-auto justify-content-lg-end" id="navbarSupportedContent">
        <ul class="navbar-nav  mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link mx-1" href="index.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link mx-1" href="product.php">Shop</a>
          </li>
          <?php 
            if(isset($_SESSION['is_login']) && isset($_SESSION['buyerEmail']) ){
                $sql="SELECT COUNT(cart_id)
                FROM cart
                WHERE bu_id=$bu_id;";
                // echo $sql;
                $result=$conn->query($sql);
                $row=$result->fetch_assoc();
                 ?>
                  <li class="nav-item">
                    <a class="nav-link" href="mycart.php" style="padding:0px;">
                      <span class="d-md-none d-block">Cart&nbsp;<span class="badge bg-danger text-light rounded-pill">&nbsp;<?php echo ($row['COUNT(cart_id)']); ?>&nbsp;</span></span>
                      <i class="fa fa-shopping-bag d-md-block d-none position-relative" style="font-size:2.5rem; padding:0px;" aria-hidden="true">
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-light" style="font-size:1rem;">&nbsp;<?php echo ($row['COUNT(cart_id)']); ?>&nbsp;
                          <span class="visually-hidden">Items in cart</span>
                        </span>
                      </i>
                    </a>
                  </li>
                 <?php
            }
            else{
          ?>

          <li class="nav-item">
            <a class="nav-link mx-1" href="about.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-1" href="contact.php">Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-1" href="privacypolicy.php">Privacy Policy</a>
          </li>
          <?php
            }
            ?>
          </ul>
      </div>
    </div>
  </nav>



<?php require("components/login.inc.php"); ?>