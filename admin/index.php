<?php 
include("dashboard/session.inc.php");
include("dashboard/header.inc.php");
include("dashboard/sidepane.inc.php");
include_once("../dbconnection.php");

$sql="SELECT * FROM orders";
$result=$conn->query($sql);
$totalOrders=$result->num_rows;

$sql="SELECT * FROM seller";
$result=$conn->query($sql);
$totalseller=$result->num_rows;

$sql="SELECT * FROM buyer";
$result=$conn->query($sql);
$totalbuyer=$result->num_rows;

$sql="SELECT * FROM products";
$result=$conn->query($sql);
$totalproducts=$result->num_rows;
?>

<!-- Body Starts -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin Dashboard</h1>
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


        <div class="container-fluid">
          <div class="row my-2">
            <div class="col-lg-3 col-md-6">  
            <div class="p-1 text-center rounded">
              <div class="card text-center text-light">
                <div class="card-header fw-bold" style="background-color:#084298;">
                  Total Orders
                </div>
                <div class="card-body " style="background-color:#0D6EFD;">
                  <h1 class="card-title" style="font-size:3.5rem;"><?= $totalOrders ?></h1>
                </div>
                <a href="orders.php" class="stretched-link fw-bold text-light" style="text-decoration:none;">
                  <div class="card-footer " style="background-color:#084298;">
                    View
                  </div>
                </a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">  
            <div class="p-1 text-center rounded">
              <div class="card text-center text-light">
                <div class="card-header fw-bold" style="background-color:#084298;">
                  Registered Buyers
                </div>
                <div class="card-body " style="background-color:#0D6EFD;">
                  <h1 class="card-title" style="font-size:3.5rem;"><?= $totalbuyer ?></h1>
                </div>
                <a href="buyer.php" class="stretched-link fw-bold text-light" style="text-decoration:none;">
                  <div class="card-footer " style="background-color:#084298;">
                    View
                  </div>
                </a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">  
            <div class="p-1 text-center rounded">
              <div class="card text-center text-light">
                <div class="card-header fw-bold" style="background-color:#084298;">
                  Registered Sellers
                </div>
                <div class="card-body " style="background-color:#0D6EFD;">
                  <h1 class="card-title" style="font-size:3.5rem;"><?= $totalseller ?></h1>
                </div>
                <a href="seller.php" class="stretched-link fw-bold text-light" style="text-decoration:none;">
                  <div class="card-footer " style="background-color:#084298;">
                    View
                  </div>
                </a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">  
              <div class="p-1 text-center rounded">
                <div class="card text-center text-light">
                  <div class="card-header fw-bold" style="background-color:#084298;">
                    All   Products
                  </div>
                  <div class="card-body " style="background-color:#0D6EFD;">
                    <h1 class="card-title" style="font-size:3.5rem;"><?= $totalproducts ?></h1>
                  </div>
                  <a href="products.php" class="stretched-link fw-bold text-light" style="text-decoration:none;">
                    <div class="card-footer " style="background-color:#084298;">
                      View
                    </div>
                  </a>
                  </div>
                </div>
              </div>
            </div>
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="p-1 text-center rounded">
                <div class="card text-center text-light">
                  <div class="card-header fw-bold" style="background-color:#0F5132;">
                    Total Transaction
                  </div>
                  <div class="card-body " style="background-color:#198754;">
                    <h1 class="card-title" style="font-size:3.5rem;"><?= $totalproducts ?></h1>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="p-1 text-center rounded">
                <div class="card text-center text-light">
                  <div class="card-header fw-bold" style="background-color:#0F5132;">
                    Total Order Dilivered
                  </div>
                  <div class="card-body " style="background-color:#198754;">
                    <h1 class="card-title" style="font-size:3.5rem;"><?= $totalproducts ?></h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        
      
    </main>

  </div>
</div>
<!-- Body Ends -->

<?php include("dashboard/footer.inc.php") ?>
</body>
</html>