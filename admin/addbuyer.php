<?php
if (!isset($_SESSION)) {
  session_start();
}
if (!(isset($_SESSION['is_login']) && isset($_SESSION['adminEmail']))) {
  header('location:../index.php');
}

include_once('../dbconnection.php');
include("dashboard/header.inc.php");
include("dashboard/sidepane.inc.php"); 
if (isset($_REQUEST['buyerSubmitBtn'])) {
  //checking for empty feild
  if (($_REQUEST['bu_fname'] == "") || ($_REQUEST['bu_lname'] == "") || ($_REQUEST['bu_email'] == "") || ($_REQUEST['bu_number'] == "") || ($_REQUEST['bu_password'] == "")) {
    $msg = ' <div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Are Required....!</div> ';
  } else {
    $bu_fname = $_REQUEST['bu_fname'];
    $bu_lname = $_REQUEST['bu_lname'];
    $bu_email = $_REQUEST['bu_email'];
    $bu_number = $_REQUEST['bu_number'];
    $bu_password = $_REQUEST['bu_password'];


    $sql = " INSERT INTO buyer(bu_fname, bu_lname, bu_email,bu_number, bu_password) 
  VALUES ('$bu_fname','$bu_lname','$bu_email','$bu_number','$bu_password') ";

    if ($conn->query($sql) == TRUE) {
      $msg = ' <div class="alert alert-success col-sm-6 ml-5 mt-2">product Added Successfully....!</div> ';
      echo "<script>location.href='buyer.php';</script>";
    } else {
      $msg = ' <div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add product....!</div> ';
    }
  }
}
?>
<!-- Body Starts -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add buyer</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

      <!-- Body content starts -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="my-4 mx-3">
              <form action="" method="POST">
                <div class="form-group mb-3">
                  <label for="bu_fname">buyer First Name</label>
                  <input type="text" class="form-control" id="bu_fname" name="bu_fname">
                </div>
                <div class="form-group mb-3">
                  <label for="bu_lname">buyer Last name</label>
                  <input type="text" class="form-control" id="bu_lname" name="bu_lname" row="2"></input>
                </div>
                <div class="form-group mb-3">
                  <label for="bu_email">buyer Email</label>
                  <input type="text" class="form-control" id="bu_email" name="bu_email">
                </div>
                <div class="form-group mb-3">
                  <label for="bu_number">buyer Phone Number</label>
                  <input type="text" class="form-control" id="bu_number" name="bu_number">
                </div>
                <div class="form-group mb-3">
                  <label for="bu_password">buyer Password</label>
                  <input type="text" class="form-control" id="bu_password" name="bu_password" value="123" readonly>
                </div>
  

                <div class="text_center my-3">
                  <button type="submit" class="btn btn-danger" id="buyerSubmitBtn" name="buyerSubmitBtn">Submit</button>
                  <a href="buyer.php" class="btn btn-secondary">Close</a>
                </div>
                <?php
                if (isset($msg)) {
                echo $msg;
                  }
                ?>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Body content Ends -->
    </main>

  </div>
</div>
<!-- Body Ends -->

<?php include("dashboard/footer.inc.php") ?>
</body>