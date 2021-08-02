<?php 
include("dashboard/session.inc.php");
include("dashboard/header.inc.php");
include("dashboard/sidepane.inc.php");
include_once('../dbconnection.php');
?>



  <!-- Body Starts -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Seller List</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <input type="button" class="btn btn-sm btn-outline-secondary" value="Export" onclick="window.print()"></input>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>
<?php
    $sql = " SELECT * FROM seller ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
  ?>
      <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">E-mail</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
  <?php
          while ($row = $result->fetch_assoc()) {
            $img=$row['se_img']
          ?>
    <tr>
      <th scope="row"><?php echo $row['se_id'] ?></th>
      <td><?php echo $row['se_fname']. " ".$row['se_lname'] ?></td>
      <td><?php echo $row['se_email'] ?></td>
      <td>
        
      <form method="POST" class="d-inline" action="editseller.php">
                  <input type="hidden" name="id" value="<?php echo $row['se_id'] ?>">
                  <button type="submit" class="btn btn-secondary" name="view" value="view"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                </form>
                <form method="POST" class="d-inline" action="">
                  <input type="hidden" name="id" value=' <?php echo $row["se_id"] ?> '>
                  <button type="submit" class="btn btn-secondary" name="delete" value="delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
      
      </td>
    </tr>
    <?php
          } ?>
  </tbody>
</table>

<?php }
 else {
      echo ("Data not found");
    }

    if (isset($_REQUEST['delete'])) {
      unlink($img );
      $sql = " DELETE FROM seller WHERE se_id = {$_REQUEST['id']} ";
      if ($conn->query($sql) == TRUE) {
        echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
      } else {
        echo "Unable to delete data";
      }
    }

    ?>
<a class="btn btn-primary box mb-5" href="addseller.php">Add Seller&nbsp;<i class="fa fa-plus" aria-hidden="true"></i></a>




</main>

  </div>
</div>
<!-- Body Ends -->

<?php include("dashboard/footer.inc.php") ?>
</body>
</html>