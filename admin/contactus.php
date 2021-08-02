<?php 
include("dashboard/session.inc.php");
include("dashboard/header.inc.php");
include("dashboard/sidepane.inc.php");
include("../dbconnection.php");
?>
<!-- Body Starts -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Contact Queries</h1>
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
      <main>
      <!-- Body content starts -->

<?php
    $sql = " SELECT * FROM contactus ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
  ?>
  <div style="overflow-x:auto;">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">NAME</th>
          <th scope="col">E-mail</th>
          <th scope="col">Read</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
      <?php
          while ($row = $result->fetch_assoc()) {
          ?>
        <tr>
          <td scope="row"><?php echo $row['contact_id'] ?></th>
          <td><?php echo $row['contact_name'] ?></td>
          <td><?php echo $row['contact_email'] ?></td>
          <td>
            
            <form method="POST" class="d-inline" action="viewcontact.php">
                <input type="hidden" name="id" value=' <?php echo $row["contact_id"] ?> '>
              <button type="submit" class="btn btn-secondary" name="view" value="view"><i class="fa fa-eye" aria-hidden="true"></i></button>
            </form>
            </td>
            <td>
            <form method="POST" class="d-inline" action="">
             <input type="hidden" name="id" value=' <?php echo $row["contact_id"] ?> '>
              <button type="submit" class="btn btn-secondary" name="delete" value="delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
            </form>

          </td>
        </tr>
      <?php
          } ?>
      </tbody>
    </table>
  </div>
<?php }
 else {
      echo ("Data not found");
    }

    if (isset($_REQUEST['delete'])) {
      $sql = " DELETE FROM contactus WHERE contact_id = {$_REQUEST['id']} ";
      if ($conn->query($sql) == TRUE) {
        echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
      } else {
        echo "Unable to delete data";
      }
    }

    ?>
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
<!-- Body Ends -->


</body>
</html>