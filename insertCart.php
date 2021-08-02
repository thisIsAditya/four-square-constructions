<?php
session_start();
if(isset(($_SESSION['is_login'])) && (isset($_SESSION['buyerEmail'])))
{
    include_once('dbconnection.php');

    $sql = "SELECT bu_id FROM buyer WHERE bu_email = '{$_SESSION['buyerEmail']}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $bu_id = $row['bu_id'];
    
    

    if (isset($_REQUEST['addcart'])) {
            $pr_id = $_REQUEST['pr_id'];
            $se_id = $_REQUEST['se_id'];
            $cart_qty = $_REQUEST['quantity'];
            $pr_sellingprice = $_REQUEST['pr_sellingprice'];
            $cart_total = $cart_qty * $pr_sellingprice;

            $sql ="SELECT pr_id,cart_id,cart_qty FROM cart WHERE bu_id=$bu_id AND pr_id=$pr_id";
            $res = $conn->query($sql);
            $row = $res->fetch_assoc();
            if($res->num_rows == 0){
                //Normal code
                $sql = "INSERT INTO cart(pr_id, cart_qty,cart_total,bu_id,se_id) 
                VALUES ('$pr_id','$cart_qty','$cart_total','$bu_id','$se_id') ";
    
                if($conn->query($sql))
                {
                    echo "<script>location.href='product.php';</script>";
    
                }
                else{
                        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Couldn\'t Add to cart</div><script>location.href=\'mycart.php\';</script>';
                        echo "DB Error!";
                            
                }
                // echo $sql;
            }
            else{
                $new_cart_qty = $row['cart_qty'] + $cart_qty;
                // $conn->query();
                if($conn->query("UPDATE `cart` SET `cart_qty`='$new_cart_qty' WHERE cart_id={$row['cart_id']}"))
                {
                    echo "<script>location.href='product.php';</script>";
    
                }
                else{
                        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Couldn\'t Add to cart</div><script>location.href=\'mycart.php\';</script>';
                        echo "DB Error!";
                            
                }
            }
          
    }
} 
?>
