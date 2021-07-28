<?php 
include("dashboard/session.inc.php");
include("dashboard/header.inc.php");
include("dashboard/sidepane.inc.php");
include_once('../dbconnection.php');
if (isset($_REQUEST['buyerUpdateBtn'])) {
  //checking for empty feild
  // echo "clicked";
  if (($_REQUEST['bu_fname'] == "") || ($_REQUEST['bu_fname'] == "") || ($_REQUEST['bu_email'] == "") || ($_REQUEST['bu_number'] == "")) {
    $msg = ' <div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Are Required....!</div> ';
  } 
  else {
    $bu_id=$_REQUEST['bu_id'];
    $bu_fname = $_REQUEST['bu_fname'];
    $bu_lname = $_REQUEST['bu_lname'];
    $bu_email = $_REQUEST['bu_email'];
    $bu_number = $_REQUEST['bu_number'];

    // $bu_brand = $_REQUEST['bu_brand'];
    // $bu_img = '../img/buyerimg/' . $_FILES['bu_img']['name'];

    $sql = "UPDATE buyer SET bu_id= '$bu_id',bu_fname='$bu_fname',bu_lname='$bu_lname',bu_email='$bu_email',bu_number='$bu_number'
    WHERE bu_id = '$bu_id'";
    // echo $sql;
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
        <h1 class="h2">Edit buyer</h1>
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
      <?php
    if (isset($_REQUEST['view'])) {
      $sql = "SELECT * FROM buyer WHERE bu_id = {$_REQUEST['id']}";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
    }
    ?>

      <!-- Body content starts -->
      <div class="container-fluid">
        <div class="row">
          <!-- <div class="col-md-3">
            <div class="m-3 p 2">
              <img src="<?php// if(isset($row['bu_img'])){echo $row['bu_img'];} ?>" class="img-thumbnail" alt="buyer Image">
            </div>
          </div> -->
          
          <div class="col-md-9 d-flex align-items-center">
            <div class="m-3 p-2">
              <p class="h2"><strong>ID : <?php if(isset($row['bu_id'])){echo $row['bu_id'];} ?></strong></p>
              
            </div>
          </div>

          <div class="col-lg-6">
            <div class="m-2 p-2">
  
              <form action="" method="POST" enctype="multipart/form-data">

              <div class="form-group mb-3">
                  <label for="bu_id">buyer ID</label>
                  <input type="text" class="form-control" id="bu_id" name="bu_id" value="<?php if (isset($row['bu_id'])) {
                    echo $row['bu_id'];
                  } ?>" readonly>
                </div>

                <div class="form-group mb-3">
                  <label for="bu_fname">buyer First Name</label>
                  <input type="text" class="form-control" id="bu_fname" name="bu_fname" value="<?php if (isset($row['bu_fname'])) {
                    echo $row['bu_fname'];
                  } ?>">
                </div>
                <div class="form-group mb-3">
                  <label for="bu_lname">buyer Last Name</label>
                  <input type="text" class="form-control" id="bu_lname" name="bu_lname" row="2" value="<?php if(isset($row['bu_lname'])){echo $row['bu_lname'];} ?>"></input>
                </div>
                <div class="form-group mb-3">
                  <label for="buyer_email">buyer E-mail</label>
                  <input type="text" class="form-control" id="bu_email" name="bu_email" value="<?php if(isset($row['bu_email'])){echo $row['bu_email'];} ?>">
                </div>
                <div class="form-group mb-3">
                  <label for="bu_number">buyer Phone Number</label>
                  <input type="text" class="form-control" id="bu_number" name="bu_number" value="<?php if(isset($row['bu_number'])){echo $row['bu_number'];} ?>"> 
                </div>

              
                <div class="text_center my-3">
                  <button type="update" class="btn btn-danger" id="buyerUpdateBtn" name="buyerUpdateBtn">Update</button>
                  <a href="buyer.php" class="btn btn-secondary">Close</a>
                </div>
                <?php
                if (isset($msg)) {
                  echo $msg;
                  echo "<script>window.location.href='buyer.php';</script>";

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