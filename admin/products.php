<?php include("dashboard/header.inc.php") ?>
<?php include("dashboard/sidepane.inc.php") ?>
<!-- Body Starts -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin Dashboard</h1>
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

      <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">QUANTITY</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td><button type="submit" class="btn btn-secondary" name="view" value="View"><i class="fa fa-pencil" aria-hidden="true"></i></button>
      <button type="submit" class="btn btn-secondary" name="view" value="View"><i class="fa fa-trash" aria-hidden="true"></i></button>
      </td>
    </tr>

  </tbody>
</table>
<a class="btn btn-primary box" href="addproducts.php"><i class="fa fa-plus" aria-hidden="true"></i></a>




</main>

  </div>
</div>
<!-- Body Ends -->

<?php include("dashboard/footer.inc.php") ?>

</body>
</html>