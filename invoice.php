<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Integration -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script> -->

    <!-- Bootsrtap Integration Ends-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Invoice | Four Square Construction</title>
    <style>
        .footer-2 {
            background-color: #000814;
            color:whitesmoke;
        }
    </style>
    </head>
    <body>
    <?php 
    session_start();
    include_once('dbconnection.php');
    $sql = "SELECT * FROM orders JOIN seller ON orders.se_id = seller.se_id JOIN buyer ON orders.bu_email=buyer.bu_email where ord_id = '{$_REQUEST['id']}' ";
    // echo $sql;
    $result=$conn->query($sql);
    if($result->num_rows > 0){
        $row=$result->fetch_assoc();
        // print_r($row);
        ?>

        <div class="container">
            <table class="table text-center">
                <tbody>
                    <tr rowspan="4">
                        <td scope="col" colspan="4"><br>
                            <p class="h4 fw-bold">
                                FOUR SQUARE <br>CONSTRUCTION SOLUTIONS
                            </p> 
                        </td>
                        <td scope="col" colspan="4">
                            <address>
                                BCA-VIth Semester,<br>
                                School of Management Sciences,<br> 
                                Varanasi, Uttar Pradesh<br>
                                contact@foursquareconstructions.com<br>
                            </address>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="4">Seller Info</th>
                        <th colspan="4">Order Info</th>
                    </tr>

                    <tr>
                        <td colspan="2">Seller Name</td>
                        <td colspan="2"><?php echo($row['se_fname'] . " " . $row['se_lname']); ?></td>
                        <td colspan="2">Order ID : </td>
                        <td colspan="2"><?php echo($row['ord_id']); ?></td>
                    </tr>

                    <tr>
                        <td colspan="2">Seller Email</td>
                        <td colspan="2"><?php echo($row['se_email']); ?></td>
                        <td colspan="2">Payment Status : </td>
                        <td colspan="2"><?php echo($row['payment_status']); ?></td>
                    </tr>

                    <tr rowspan="3">
                        <td colspan="2" >Seller Address</td>
                        <td colspan="2" ><?php echo($row['se_address']); ?></td>
                        <th colspan="4">Product Details </th>
                    </tr>

                    <tr>
                        <td colspan="4"></td>
                        <th>Sr. No.</th>
                        <th>Name</th>
                        <th>Qty.</th>
                        <th>Price</th>
                    </tr>
                    <?php
                        $sql="SELECT `products`.pr_name,`order-product`.pr_qty,`products`.pr_sellingprice FROM `order-product` JOIN `products` ON `order-product`.pr_id = `products`.pr_id WHERE `order-product`.ord_id = '{$_REQUEST['id']}'";
                        // echo $sql;
                        $res = $conn->query($sql);
                        $sno=0;
                        // print_r($res);
                        // $r = $res->fetch_assoc();
                        // print_r($r);
                        while($r = $res->fetch_assoc()){
                    ?>
                            <tr>
                                <td colspan="4"></td>
                                <td><?php echo ++$sno; ?></td>
                                <td><?php  echo $r['pr_name']; ?></td>
                                <td><?php echo $r['pr_qty']; ?></td>
                                <td><?php  echo ($r['pr_qty'] * $r['pr_sellingprice']); ?></td>
                            </tr>
                    <?php
                        }
                    ?>
                    <tr>
                        <th>Buyer Address</th>
                        <th colspan="7 "></th>
                    </tr>
                    <tr>
                        <th colspan="8"><?php echo $row['bu_address'] ;  ?></th>
                    </tr>

                    <tr>
                        <td colspan="2">Txn Date</td>
                        <td colspan="2"><?php echo($row['ord_txnDate']); ?></td>
                        <td colspan="2">Total Amount : </td>
                        <td colspan="2"><?php echo($row['ord_amt']); ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="text-end m-3">
                <form action="" class="d-print-none">
                    <input type="button" class="btn btn-md btn-success" value="Print" onclick="window.print()"></input>
                    <a href="index.php" class="btn btn-primary">Return To site</a>
                </form>
            </div>
        </div>

        <?php
    }
    else{
        echo "No Orders Found. Redirecting...";
        if(isset($_SESSION['buyerEmail'])){
            header('location:buyer/orders.php');
        }
        elseif (isset($_SESSION['sellerEmail'])) {
            header('location:seller/orders.php');
        }
        elseif (isset($_SESSION['AdminEmail'])) {
            header('location:seller/orders.php');
        }
        else{
            header('location:index.php');
        }
    }
    ?>
    <footer>
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