<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
session_start();
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");


require_once("../dbconnection.php");

$ORDER_ID = $_POST["ORDER_ID"];
$bu_email=$_SESSION['buyerEmail'];

$sql= "SELECT * FROM cart join buyer on buyer.bu_id=cart.bu_id join products on cart.pr_id = products.pr_id where buyer.bu_email = '$bu_email'";
$result = $conn->query($sql);
// $row = $result->fetch_assoc();
while($row = $result->fetch_assoc()){
	$sq="INSERT INTO `order-product`(`ord_id`, `pr_id`,`pr_qty`) VALUES ('$ORDER_ID',{$row['pr_id']},{$row['cart_qty']})";
	// echo $sq;
	$conn->query($sq);
}
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$bu_id=$row['bu_id'];
$se_id=$row['se_id'];
$bu_email=$row['bu_email'];
$pr_id=$row['pr_id'];
$cart_id=$row['cart_id'];

$ord_prName = $row['pr_name'];
$cart_qty = $row['cart_qty'];
// $cart_total = $row['cart_total'];
$cart_total = $_REQUEST['TXN_AMOUNT'];


$sql = "INSERT INTO `orders`(`ord_qty`, `ord_amt`, `bu_email`, `se_id`, `ord_id`,`cart_id`) VALUES ($cart_qty,$cart_total,'$bu_email',$se_id,'$ORDER_ID','$cart_id')";

// echo $sql;
if($conn->query($sql)){

$checkSum = "";
$paramList = array();
$CUST_ID = $_POST["CUST_ID"];
$INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
$CHANNEL_ID = $_POST["CHANNEL_ID"];
$TXN_AMOUNT = $_POST["TXN_AMOUNT"];

// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $CUST_ID;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
$paramList["CALLBACK_URL"] = "https://192.168.43.79/four-square-constructions/PaytmKit/pgResponse.php";
$paramList["EMAIL"] = $_SESSION['buyerEmail']; //Email ID of customer
// echo $paramList["EMAIL"];

/*
$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
$paramList["VERIFIED_BY"] = "EMAIL"; //
$paramList["IS_USER_VERIFIED"] = "YES"; //

*/

//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);

?>
<html>
<head>
<title>Construction Solution | Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo $PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>


<?php
}
else{
	echo "Failed";
		// header('location:../mycart.php');
}