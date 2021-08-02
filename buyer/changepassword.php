<?php 
include("dashboard/session.inc.php");
include("dashboard/header.inc.php");
include("dashboard/sidepane.inc.php");
include_once('../dbconnection.php');

if (isset($_REQUEST['passwordUpdateBtn'])) {
  if (($_REQUEST['inputnewpassword'] == "")) {
    $passmsg = '<div class="alert alert-warning col-sm-6 ml-5" role="status"> Fill All Field </div>';
  } else {
    $buyerEmail = $_SESSION['buyerEmail'];
    $sql = "SELECT * FROM buyer WHERE bu_email ='$buyerEmail'";
    // echo $sql;
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
      $bu_password = $_REQUEST['inputnewpassword'];
      $sql = "UPDATE buyer SET bu_password='$bu_password' WHERE bu_email='$buyerEmail'";
      if ($conn->query($sql) == TRUE) {
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5" role="status">Update Successful</div>';
      } else {
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5" role="status"> Unable to update</div>';
      }
    }
  }
}
?>
<!-- Body Starts -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Change Password</h1>
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
            <div class="m-2 p-2">
              <form action="" method="POST">
              <div class="form-group">
            <lable for="bu_email">Email</lable>
            <input type="email" class="form-control" id="bu_email" name ="bu_email" value="<?php echo $_SESSION['buyerEmail']; ?>" readonly>
          </div>
                <div class="form-group mb-3">
                  <label for="inputnewpassword">New Password</label>
                  <input type="text" class="form-control" id="inputnewpassword" name="inputnewpassword">
                </div>
                <div class="text_center my-3">
                  <button type="submit" class="btn btn-danger" id="passwordUpdateBtn" name="passwordUpdateBtn">Submit</button>
                  <button type="reset" class="btn btn-info">Reset</button>
                </div>
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

<footer class="fixed-bottom">
  <div class="footer-2 text-center py-2">
    <div class="container">
        <p class="my-2">
            Made with  &hearts;  in School of Management Sciences, Varanasi
        </p>
    </div>
  </div>
</footer>
</body>
</html>