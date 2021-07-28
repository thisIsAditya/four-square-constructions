<?php 
include("dashboard/session.inc.php");
include("dashboard/header.inc.php");
include("dashboard/sidepane.inc.php");
include_once('../dbconnection.php');
if (isset($_REQUEST['profileSubmitBtn'])) {
  //checking for empty feild
  //echo "clicked";
  if (($_REQUEST['admin_id'] == "") || ($_REQUEST['admin_fname'] == "") || ($_REQUEST['admin_number'] == "")  || ($_REQUEST['admin_email'] == "")) {
    $msg = ' <div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Are Required....!</div> ';
  } 
  else {
    $admin_id = $_REQUEST['admin_id'];
    $admin_fname = $_REQUEST['admin_fname'];
    $admin_lname = $_REQUEST['admin_lname'];
    // $admin_address = $_REQUEST['admin_address'];
    $admin_number = $_REQUEST['admin_number'];
    $admin_email = $_REQUEST['admin_email'];
    //uploading image
    $admin_img = $_FILES['admin_img']['name'];
    $admin_img_temp = $_FILES['admin_img']['tmp_name'];
    // echo $admin_img_temp;
    $img_folder = "../image/adminprofileimg/" . $admin_img;
    move_uploaded_file($admin_img_temp, $img_folder);

    $sql = "UPDATE administration SET admin_id='$admin_id',admin_fname='$admin_fname',admin_lname='$admin_lname',admin_number='$admin_number',admin_email='$admin_email', admin_img='$img_folder' WHERE admin_id = '$admin_id' ";
      // echo $sql;
    // $result = $conn->query($sql);
    if ($conn->query($sql) == TRUE) {
      $msg = ' <div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully....!</div> ';
    }   
    else {
      $msg = ' <div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to update....!</div> ';
    }
  }
}
?>
<!-- Body Starts -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profile</h1>
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
      <!-- Fetching Data to display -->
      <?php
      $sql = "SELECT * FROM administration WHERE admin_email = '{$_SESSION['adminEmail']}'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      ?>
      <!-- Fetching data ends -->
      <!-- Body content starts -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="m-3 p 2">
              <img src="<?php if(isset($row['admin_img'])){echo $row['admin_img'];} ?>" class="img-thumbnail rounded-circle" alt="Profile Picture">
            </div>
          </div>
          
          <div class="col-md-9 d-flex align-items-center">
            <div class="m-3 p-2">
              <p class="h2"><strong><?php if(isset($row['admin_fname'])){echo ($row['admin_fname'] ." " . $row['admin_lname']);} ?></strong></p>
              <p class="h4 text-muted"><?php if(isset($row['admin_email'])){echo $row['admin_email'];} ?></p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="m-2 p-2">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3">
                  <label for="admin_name">ID</label>
                  <input type="text" class="form-control" id="admin_id" name="admin_id" placeholder="" value="<?php if(isset($row['admin_id'])){echo $row['admin_id'];} ?>" readonly>
                </div>
                <div class="form-group mb-3">
                  <label for="admin_name">Name</label>
                  <input type="text" class="form-control" id="admin_fname" name="admin_fname" placeholder="" value="<?php if(isset($row['admin_fname'])){echo $row['admin_fname'];} ?>">
                  <input type="text" class="form-control" id="admin_lname" name="admin_lname" placeholder="" value="<?php if(isset($row['admin_lname'])){echo $row['admin_lname'];} ?>">
                </div>
                <div class="form-group mb-3">
                  <label for="admin_quantity">E-mail</label>
                  <input type="text" class="form-control" id="admin_email" name="admin_email" value="<?php if(isset($row['admin_email'])){echo $row['admin_email'];} ?>" readonly>
                </div>
                <!-- <div class="form-group mb-3">
                  <label for="admin_unit">Address</label>
                  <textarea type="text" class="form-control" id="admin_address" name="admin_address"></textarea>
                </div> -->

                <div class="form-group mb-3">
                  <label for="admin_origional_price">Phone Number</label>
                  <input type="text" class="form-control" id="admin_number" name="admin_number" value="<?php if(isset($row['admin_number'])){echo $row['admin_number'];} ?>">
                </div>
                <div class="form-group my-5">
                  <label for="admin_img">Profile Image</label>
                  <input type="file" class="form-control-file" id="admin_img" name="admin_img">
                </div>

                <div class="text_center my-3">
                  <button type="submit" class="btn btn-danger" id="profileSubmitBtn" name="profileSubmitBtn">Submit</button>
                  <a href="profile.php" class="btn btn-secondary">Close</a>
                </div>
                <?php
                if(isset($msg)) {
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
</html>