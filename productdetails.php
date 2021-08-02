<!-- Header Section Starts -->
<?php require("components/header.inc.php");
include('./dbconnection.php'); ?>
<title>Shop | Four Square Constructions</title>
</head>
<!-- Header Section Ends -->

<body>
    <!-- Navbar Starts -->
    <?php require("components/navbar.inc.php");
    
    ?>
    <!-- Navbar Ends -->

    <section class="mt-4 mb-5">
        <div class="container">
            <?php
                if(isset($_REQUEST['pr_id']))
                {
                    $pr_id=$_REQUEST['pr_id'];
                    $quantity=$_REQUEST['quantity'];
                    $sql = "SELECT * FROM products join seller ON products.se_id = seller.se_id WHERE products.pr_id ='$pr_id'";
                    $result = $conn->query($sql);
                    $row=$result->fetch_assoc();
                }
                ?>
            <div class="row my-2 mx-2 py-2 row-eq-height align-items-center">
                <div class="col-lg-6">
                    <!-- Product Image slider here -->
                    <div class="product-image">
                    <img src="<?php echo (str_replace('..', '.', $row['pr_img'])); ?>" alt="" id="main-img" class="w-100">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="" style="background-color:#e9ecef;">
                        <form action="insertCart.php" method="POST">

                        <!-- Product Info here -->
                        <div class="mx-4">
                        <input type="hidden" name="pr_name" id="pr_name" value="<?php echo $row['pr_name']; ?>">
                            <p class="h3 text-underline fw-bold py-4 "><?php echo $row['pr_name'];?></p>
                            <input type="hidden" name="se_id" id="se_id" value="<?php echo $row['se_id']; ?>">
                        </div> 
                        <div class="mx-4">
                            
                        <input type="hidden" name="pr_unit" id="pr_unit" value="<?php echo $row['pr_unit']; ?>">
                            <p class="h5 py-1 mt-1">Quantity Order : <?php echo $_REQUEST['quantity']." ".$row['pr_unit'];?></p>
                        </div> 
                        <div class="mx-4">
                            <input type="hidden" name="pr_sellingprice" id="pr_sellingprice" value="<?php echo $row['pr_sellingprice']; ?>">
                            <span class="fw-bold">Price:</span>
                            <span class="border border-dark rounded-pill border-2 p-1">
                                <p class="card-text d-inline">
                                    <small><del class="text-danger fw-bold">&#8377; <?php echo $row['pr_origionalprice']; ?>/<?php echo $row['pr_unit']; ?></del></small>
                                &nbsp;
                                
                                    <strong>&#8377; <?php echo $row['pr_sellingprice']; ?>/<small><?php echo $row['pr_unit']; ?></small></strong>
                                </p>
                            </span>
                        </div>
                        <div class="mx-4">
                        <input type="hidden" name="se_fname" id="se_fname   " value="<?php echo $row['se_fname']; ?>">
                            <p class="h5 py-1 my-2">Seller Name : <?php echo $row['se_fname'].' '.$row['se_lname'] ; ?></p>
                            <input type="hidden" name="se_lname" id="se_lname" value="<?php echo $row['se_lname']; ?>">
                        </div> 
                        <div class="mx-4">
                            <?php $totalPrice = $_REQUEST['quantity']*$row['pr_sellingprice']; ?>
                            <p class="h5 py-1 mt-1">Total Price :&nbsp;<span class="fw-bold border border-success border-3 rounded-pill px-2 bg-success ">&#8377;<?php echo $totalPrice ?></span></p>
                        </div> 
                        <div class="mx-4 mt-1">
                            <p class="h7">
                            <input type="hidden" name="quantity" id="quantity" value="<?php echo $quantity; ?>">
                            <strong class="h4 ">Description</strong>
                            <p><?php echo $row['pr_desc']; ?></p>
                            </p>
                        </div>
                        <div class="row mx-3 py-3">
                            <div class="col-sm-4 my-2">
                            <input type="hidden" name="pr_id" id="pr_id" value="<?php echo $row['pr_id']; ?>"> 
                            <?php if(isset(($_SESSION['is_login'])) && (isset($_SESSION['buyerEmail'])))
                            {?>
                            <button type="submit" name="addcart" class="btn btn-primary">Add To Cart</button>
                            <?php } else{?>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Add To Cart</button>
                                <?php }?>
                            </div>
                            <div class="col-sm-4 my-2">
                                     <?php if(isset(($_SESSION['is_login'])) && (isset($_SESSION['buyerEmail'])))
                            {?>

                            <?php
                                $sql = "SELECT bu_id FROM buyer WHERE bu_email = '{$_SESSION['buyerEmail']}'";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();
                                $bu_id = $row['bu_id'];
                            ?>
                            <!-- <a href="checkout.php?totalprice=<?php echo $totalPrice ?>&&bu_id=<?php echo $bu_id ?>" class="btn btn-primary">Buy Now</a> -->
                            <?php } else{?>
                                <!-- <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Buy Now</a> -->
                                <?php }?>
                            </div>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- jQuery library -->
    <script src="js/jquery.min.js"></script>
    
    <!-- Popper JS -->
    <script src="js/popper.min.js"></script>
    <!--Ajax-->
    <script type="text/javascript" src="js/ajaxrequest.js"></script>

    <?php include('components/footer.inc.php'); ?>
</body>
</html>