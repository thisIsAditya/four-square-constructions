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
if (isset($_REQUEST['sellerSubmitBtn'])) {
  //checking for empty feild
  if (($_REQUEST['se_fname'] == "") || ($_REQUEST['se_lname'] == "") || ($_REQUEST['se_email'] == "") || ($_REQUEST['se_number'] == "") || ($_REQUEST['se_password'] == "")) {
    $msg = ' <div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Are Required....!</div> ';
  } else {
    $se_fname = $_REQUEST['se_fname'];
    $se_lname = $_REQUEST['se_lname'];
    $se_email = $_REQUEST['se_email'];
    $se_number = $_REQUEST['se_number'];
    $se_password = $_REQUEST['se_password'];

    // //uploading image
    // $se_img = $_FILES['se_img']['name'];
    // $se_img_temp = $_FILES['se_img']['tmp_name'];
    // $img_folder = "../image/sellerimg/" . $se_img;
    // move_uploaded_file($pr_img_temp, $img_folder);
    $img_folder = "../image/constseller.png";


    $sql = " INSERT INTO seller(se_fname, se_lname, se_email,se_number, se_password,se_img) 
  VALUES ('$se_fname','$se_lname','$se_email','$se_number','$se_password','$img_folder') ";

    if ($conn->query($sql) == TRUE) {
      $msg = ' <div class="alert alert-success col-sm-6 ml-5 mt-2">product Added Successfully....!</div> ';
      echo "<script>location.href='seller.php';</script>";
    } else {
      $msg = ' <div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add product....!</div> ';
    }
  }
}
?>
<!-- Body Starts -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Seller</h1>
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
                  <label for="se_fname">Seller First Name</label>
                  <input type="text" class="form-control" id="se_fname" name="se_fname">
                </div>
                <div class="form-group mb-3">
                  <label for="se_lname">Seller Last name</label>
                  <input type="text" class="form-control" id="se_lname" name="se_lname" row="2"></input>
                </div>
                <div class="form-group mb-3">
                  <label for="se_email">Seller Email</label>
                  <input type="text" class="form-control" id="se_email" name="se_email">
                </div>
                <div class="form-group mb-3">
                  <label for="se_number">Seller Phone Number</label>
                  <input type="text" class="form-control" id="se_number" name="se_number">
                </div>
                <div class="form-group mb-3">
                  <label for="se_password">Seller Password</label>
                  <input type="text" class="form-control" id="se_password" name="se_password" value="123" readonly>
                </div>
                <!-- <div class="form-group my-5">
                  <label for="se_img">Seller Profile Image</label>
                  <input type="file" class="form-control-file" id="se_img" name="se_img" value="../image/../image/constseller.png" >
                </div> -->

                <div class="text_center my-3">
                  <button type="submit" class="btn btn-danger" id="sellerSubmitBtn" name="sellerSubmitBtn">Submit</button>
                  <a href="seller.php" class="btn btn-secondary">Close</a>
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