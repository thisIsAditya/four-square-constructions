<?php 
include("dashboard/session.inc.php");
include("dashboard/header.inc.php");
include("dashboard/sidepane.inc.php");
include_once('../dbconnection.php');
if (isset($_REQUEST['profileSubmitBtn'])) {
  //checking for empty feild
  //echo "clicked";
  if (($_REQUEST['se_id'] == "") || ($_REQUEST['se_fname'] == "") || ($_REQUEST['se_number'] == "")  || ($_REQUEST['se_email'] == "")|| ($_REQUEST['se_address'] == "")) {
    $msg = ' <div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Are Required....!</div> ';
  } 
  else {
    $se_id = $_REQUEST['se_id'];
    $se_fname = $_REQUEST['se_fname'];
    $se_lname = $_REQUEST['se_lname'];
    $se_address = $_REQUEST['se_address'];
    $se_number = $_REQUEST['se_number'];
    $se_email = $_REQUEST['se_email'];
    //uploading image
    $se_img = $_FILES['se_img']['name'];
    $se_img_temp = $_FILES['se_img']['tmp_name'];
    // echo $se_img_temp;
    $img_folder = "../image/sellerprofileimg/" . $se_img;
    move_uploaded_file($se_img_temp, $img_folder);

    $sql = "UPDATE seller SET se_id='$se_id',se_fname='$se_fname',se_lname='$se_lname',se_number='$se_number',se_address='$se_address',se_email='$se_email', se_img='$img_folder' WHERE se_id = '$se_id' ";
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
      $sql = "SELECT * FROM seller WHERE se_email = '{$_SESSION['sellerEmail']}'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      ?>
      <!-- Fetching data ends -->
      <!-- Body content starts -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="m-3 p 2">
              <img src="<?php if(isset($row['se_img'])){echo $row['se_img'];} ?>" class="img-thumbnail rounded-circle" alt="Profile Picture">
            </div>
          </div>
          
          <div class="col-md-9 d-flex align-items-center">
            <div class="m-3 p-2">
              <p class="h2"><strong><?php if(isset($row['se_fname'])){echo ($row['se_fname'] ." " . $row['se_lname']);} ?></strong></p>
              <p class="h4 text-muted"><?php if(isset($row['se_email'])){echo $row['se_email'];} ?></p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="m-2 p-2">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3">
                  <label for="se_name">ID</label>
                  <input type="text" class="form-control" id="se_id" name="se_id" placeholder="" value="<?php if(isset($row['se_id'])){echo $row['se_id'];} ?>" readonly>
                </div>
                <div class="form-group mb-3">
                  <label for="se_name">Name</label>
                  <input type="text" class="form-control" id="se_fname" name="se_fname" placeholder="" value="<?php if(isset($row['se_fname'])){echo $row['se_fname'];} ?>">
                  <input type="text" class="form-control" id="se_lname" name="se_lname" placeholder="" value="<?php if(isset($row['se_lname'])){echo $row['se_lname'];} ?>">
                </div>
                <div class="form-group mb-3">
                  <label for="se_quantity">E-mail</label>
                  <input type="text" class="form-control" id="se_email" name="se_email" value="<?php if(isset($row['se_email'])){echo $row['se_email'];} ?>" readonly>
                </div>
                <div class="form-group mb-3">
                  <label for="se_address">Address</label>
                  <textarea type="text" class="form-control" id="se_address" name="se_address"><?php if(isset($row['se_address'])){echo $row['se_address'];} ?></textarea>
                </div>

                <div class="form-group mb-3">
                  <label for="se_origional_price">Phone Number</label>
                  <input type="text" class="form-control" id="se_number" name="se_number" value="<?php if(isset($row['se_number'])){echo $row['se_number'];} ?>">
                </div>
                <div class="form-group my-5">
                  <label for="se_img">Profile Image</label>
                  <input type="file" class="form-control-file" id="se_img" name="se_img">
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