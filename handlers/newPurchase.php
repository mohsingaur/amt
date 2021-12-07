<?php
include "../bin/config.php";

$str = $_GET['str'];
$arr = explode("|", $str);

$type = $arr[0];
$brand = $arr[1];
$podate = $arr[2];
$ordate = $arr[3];
$amount = $arr[4];
$pid = $arr[5];
$qunatity = $arr[6];
$date = date("d-m-Y");

//echo "<b>Type</b> ".$type."<br><b>Brand</b> ".$brand."<br><b>Purchase Order Date</b> ".$podate."<br><b>Order Date </b>".$ordate."<br><b>Amount</b> ".$amount."<br><b>Quantity</b> ".$qunatity;

$ins = mysqli_query($con, "INSERT INTO dmi_assets (Asset_Type,Asset_Brand,PO_Date,Order_Received_Date,Total_Amount,Quantity,Asset_Purchase_ID,Created_Date) VALUES ('$type','$brand','$podate','$ordate','$amount','$qunatity','$pid','$date')");

for ($i=7; $i < count($arr)-1; $i++) { 
	//echo "<br>".$arr[$i];
	$sn = mysqli_query($con, "INSERT INTO dmi_asset_sn (Asset_SN,Asset_Purchase_ID) VALUES ('$arr[$i]','$pid')");
}

if ($ins && $sn) {
	echo "1";
}
else{
	echo "0";
}


		// $type = $_POST['type'];
		// $brand = $_POST['brand'];
		// $podate = $_POST['podate'];
		// $ordate = $_POST['ordate'];
		// $amount = $_POST['amount'];
		// $qunatity = $_POST['qunatity'];
		// $sn = $_POST['sn'];
		// var_dump($sn);
		// //date_default_timezone_set('India/Kolkata');
		// $date = date("d-m-Y");


		// $ins = mysqli_query($con, "INSERT INTO dmi_assets (Asset_Type,Asset_Brand,PO_Date,Order_Received_Date,Total_Amount,Quantity,Created_Date) VALUES ('$type','$brand','$podate','$ordate','$amount','$qunatity','$date')");
		// $snins = mysqli_query($con, "INSERT INTO dmi_asset_sn (Asset_SN) VALUES ('$sn[0]')");
		// if ($ins && $snins) {
		// 	echo "Data Saved Successfully";
		// }
		// else{
		// 	echo "Sorry!";
		// }
?>