<?php
 include("components/header.inc.php"); ?>
<title>Four Square Constructions | Home</title>
<style>
.cart .fa {
    padding: 0px;
    font-size: 22px;
    width: 20px;
  }
</style>
</head>
<body>
    <?php include("components/navbar.inc.php");
    if(!isset($_SESSION['buyerEmail']))
    {
        echo "<script>location.href='index.php';</script>";
    }
    else{
    
    include_once('dbconnection.php');

    $sql = "SELECT bu_id FROM buyer WHERE bu_email = '{$_SESSION['buyerEmail']}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $bu_id = $row['bu_id'];

    $sql = "SELECT cart.cart_id,products.pr_name,seller.se_id,seller.se_fname,seller.se_lname,products.pr_sellingprice,products.pr_unit,cart.cart_qty,cart.cart_total,cart.bu_id FROM products JOIN seller ON products.se_id = seller.se_id JOIN cart ON cart.pr_id = products.pr_id WHERE cart.bu_id = '$bu_id';";
    
    ?>
    
    <section class="cart my-2">
    <div class="container">
        <div class="row py-2">
            <div class="col-md-12">
                <div class="my-4 p-3 text-center">
                    <p class="h2">Cart</p>
                </div>
            </div>
            <div class="col-md-9">
                <div class="m-1" style="overflow-x:auto;" >
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">S.no.</th>
                                <th scope="col">Product</th>
                                <th scope="col">Seller</th>
                                <th scope="col">Price/Unit</th>
                                <th scope="col">Qty.</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $serial_no = 0;
                        $total_cart_price = 0;
                        $result=$conn->query($sql);
                        if($result->num_rows > 0)
                        {   
                        while($row=$result->fetch_assoc()){
                                 $se_id=$row['se_id'];
                        ?>
                                <tr>
                                    <td><?php echo ++$serial_no;?></td>
                                    <td><?php echo $row['pr_name'];?></td>
                                    <td><?php echo ($row['se_fname'] . $row['se_lname']);?></td>
                                    <td><?php echo ('&#8377; '.$row['pr_sellingprice']."/".$row['pr_unit']);?></td>
                                    <?php  ?>
                                    
                                <form method="GET" class="d-inline" action="" id="updateForm">
                                    <td><input type="text" style="width:60%;" name="cart_qty" value="<?php echo ($row['cart_qty'])  ;?>"><?php echo "&nbsp;".$row['pr_unit'];?></td>
                                    <input type="hidden" name="pr_sellingprice" id="pr_sellingprice" value="<?php echo $row['pr_sellingprice']; ?>">
                                    <td><?php echo '&#8377; '.$row['cart_total']; $total_cart_price +=$row['cart_total'];?></td>

                                    <input type="hidden" name="cart_id" value=' <?php echo $row["cart_id"] ?> '>
                                    <td><button type="submit" class="btn btn-primary" name="edit" value="edit"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>
                                </form>



                             <form method="POST" class="d-inline" action="" id="DeleteForm">
                                    <td>
                                        <input type="hidden" name="cart_id" value=' <?php echo $row["cart_id"] ?> '>
                                        <button type="submit" class="btn btn-primary" name="delete" value="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                </form>
                                </tr>
                        <?php
                             }
                        }
                        else{
                            echo "<tr><td><p class=\"h6 text-muted\" ><strong>Cart Is Empty... </strong></p><td></tr>";
                        }
    
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-3">
                <div class="m-1">                     
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Cart</h5>
                            <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>No. Of Items</td>
                                    <td><?php echo $serial_no; ?></td>
                                </tr>
                                <tr>
                                    <td>Total Price</td>
                                    <td><?php echo '&#8377; '.$total_cart_price; ?></td>
                                </tr>
                            </tbody>
                            </table>
                            <a href="checkout.php?totalprice=<?php echo $total_cart_price?>&bu_id=<?php echo $bu_id?>&se_id=<?php echo $se_id?>" class="btn btn-success">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex mb-3">
            <div class="m-2">
                <a href="product.php" class="btn btn-primary">Continue Shopping</a>
            </div>
            <div class="m-2">
                <a href="buyer/orders.php" class="btn btn-primary">Check Orders</a>
            </div>
        </div>
    </div>    
    </section>
    <?php
    if (isset($_REQUEST['delete'])) {
      $sql = " DELETE  FROM cart WHERE cart_id = '{$_REQUEST['cart_id']}' ";
    //   echo $sql;
      if ($conn->query($sql)==TRUE) {
        echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
      } else {
        echo "Unable to delete data";
      }
    } 
     ?>
     <?php

if (isset($_REQUEST['edit'])) {
    $pr_sellingprice=$_REQUEST['pr_sellingprice'];
    $cart_qty =$_REQUEST['cart_qty'];
    $cart_total=$cart_qty * $pr_sellingprice;
    $cart_id =$_REQUEST['cart_id'];
    $sql = "UPDATE cart SET cart_qty= '$cart_qty',cart_total= '$cart_total'
    WHERE cart_id = '$cart_id'";
    if ($conn->query($sql)==TRUE) {
        echo '<meta http-equiv="refresh" content="0;URL=?updated"/>';
    }
     }
     ?>
    <!-- <hr> -->
    <?php  
    // print_r($_SESSION); 
    ?>

    <?php } include("components/footer.inc.php"); ?>
    <!-- Bootstrap Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- jQuery library -->
    <script src="js/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="js/popper.min.js"></script>
    <!--Ajax-->
    <script type="text/javascript" src="js/ajaxrequest.js"></script>
</body>
</html>