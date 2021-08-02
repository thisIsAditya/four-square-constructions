<?php
// session_start();
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");



// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
include_once('../dbconnection.php');

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	// echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		// echo $_POST['custId'];
		$ord_txnDate=$_POST['TXNDATE'];
		$payment_status=$_POST['STATUS'];
		$ord_id=$_POST['ORDERID'];
		// Taking Buyer Email from Orders Table 
		$sql = "SELECT bu_email FROM orders WHERE ord_id='$ord_id'"; 
		//echo $sql;
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$bu_email = $row['bu_email'];
		//Taking Buyer Id from buyer Table
		$sql = "SELECT bu_id FROM buyer WHERE bu_email='$bu_email'"; 
		//echo $sql;
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$bu_id = $row['bu_id'];

		//Updating Order Table
		$sql = "UPDATE `orders` SET `ord_txnDate`='$ord_txnDate',`payment_status`='$payment_status' WHERE `ord_id`='$ord_id' ";
		if($conn->query($sql)==TRUE)
		{
			$sql = " DELETE FROM cart WHERE bu_id = '$bu_id' ";
			echo $sql;
  		if($conn->query($sql)){
				echo header('location:../buyer/orders.php');
			}
			else{
				echo "Cart Is not deleted";
			}
		}
	}
	else {

		$ord_id=$_POST['ORDERID'];
		$sql = " DELETE FROM orders WHERE ord_id = '$ord_id' ";
  	$conn->query($sql);
		echo "<b>Transaction status is failure</b>" . "<br/>";
		echo header('location:../mycart.php');

	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		// foreach($_POST as $paramName => $paramValue) {
		// 		echo "<br/>" . $paramName . " = " . $paramValue;
		// }
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>