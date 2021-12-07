<?php
	include 'bin/config.php';
	include 'templates/header.php';
	$asset_type = mysqli_query($con, "SELECT * FROM dmi_asset_type");
?>

<h2>New Asset Purchase</h2>
<div class="resp-table">
<table>
	<form id="puform" method="post" enctype="multipart/form-data">
		<tr>
			<td>Asset Type</td>
			<td>
				<select name="type" id="type">
					<option> <--Select Asset Type--></option>
					<?php
					while ($type = mysqli_fetch_assoc($asset_type)) {
						echo "<option value=".$type['Asset_Type_Name'].">$type[Asset_Type_Name]</option>";
					}
					?>
				</select>
			</td>
		</tr>

		<tr>
			<td>Asset Brand</td>
			<td>
				<select name="brand">
					<option> <--Select Asset Brand--></option>
					<option value="dell">Dell</option>
					<option value="lenovo">Lenovo</option>
					<option value="samsung">Samsung</option>
					<option value="hp">HP</option>
					<option value="others">Other</option>
				</select>				
			</td>
		</tr>

		<tr>
			<td>Purchase Order Date</td>
			<td> <input type="date" name="podate"> </td>
		</tr>

		<tr>
			<td> Order Recieved date </td>
			<td> <input type="date" name="ordate"> </td>
		</tr>

		<tr>
			<td>Total Amount</td>
			<td> <input type="text" name="amount"> </td>
		</tr>

		<tr>
			<td>Invoice No</td> <!--instead of Purchase ID-->
			<td> <input type="text" name="pid"> </td>
		</tr>

		<tr>
			<td>Qunatity</td>
			<td> <input type="number" name="qunatity" value="" onchange="genrateField(this.value)"> </td>
		</tr>

		<tr>
			<td> </td> <td id="newfield"></td>
		</tr>

		<tr>
			<td colspan="2"> <input type="button" value="Save" onclick="saveData()"> </td>
		</tr>
		<!-- <div id="newfield"></div>	 -->
	</form>
</table>
</div>
<div style="margin-left: 30px; padding: 5px;" id="recs"></div>

<div style="display: none; position: fixed; top: 50px; right: 0px; background: #ff8432; border-bottom: 3px #edff31 solid; color:#fff; width: 200px; height: auto; padding: 5px; font-size: 11px;" id="saveres"></div>


<!-- <input type="text" class="serial" > <br>
<input type="text" class="serial" > <br>
<input type="text" class="serial" > <br>
<input type="text" class="serial" > <br>
<input type="text" class="serial" > <br>
<input type="button" value="Save" onclick="saveData()"> -->
 
<script type="text/javascript">
function saveData() {
	var val = "";
	var div = document.getElementById('saveres');
	var frm = document.forms[0];
	for (var i = 0; i < frm.length; i++) {
		if(frm.elements[i].value == ""){
			div.style.display = "block";
			div.innerHTML = "Enter text.";
			exit();
		}
	}
	var type = frm.elements[0].value;
	var brand = frm.elements['brand'].value;
	var podate = frm.elements['podate'].value;
	var ordate = frm.elements['ordate'].value;
	var amount = frm.elements['amount'].value;
	var pid = frm.elements['pid'].value;
	var qunatity = frm.elements['qunatity'].value;
	
	var elem = document.getElementsByClassName("serial");
  	var names = new Array();	
  	for (var i = 0; i < elem.length; ++i) {
    	if (typeof elem[i].value !== "undefined") {
        	names.push(elem[i].value);
      	}
    }
  	var sns = names;
  	var pr = "";
  	for (var i = 0; i < sns.length; i++) {
  		pr += sns[i]+"|";
  	}
  	// document.getElementById('saveres').innerHTML = pr;
  	// alert(type+" "+brand+" "+podate+" "+ordate+" "+amount+" "+qunatity+" "+str);
  	// console.log(pr);

  	var data = type+"|"+brand+"|"+podate+"|"+ordate+"|"+amount+"|"+pid+"|"+qunatity+"|"+pr;

  	document.getElementById('recs').innerHTML = "Type: "+type+"<br>Brand: "+brand+"<br>Purchase Order Date: "+podate+"<br>Order Recieved Date: "+ordate+"<br>Amount: "+amount+"<br>PID: "+pid+"<br>Qunatity: "+qunatity+"<br>S/N: "+pr;
  	
  	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			val = this.responseText;
		}
		if (val == "1") {
			div.style.display = "block";
			div.innerHTML = "Data Saved Successfully";
		}
		else{
			div.style.display = "block";
			div.innerHTML = "Oops! Something goes wrong."
		}
	};
	xhttp.open("POST","handlers/newPurchase.php?str="+data,true);
	xhttp.send(null);

}


</script>

<?php

// if (isset($_POST['save'])) {

// 		$type = $_POST['type'];
// 		$brand = $_POST['brand'];
// 		$podate = $_POST['podate'];
// 		$ordate = $_POST['ordate'];
// 		$amount = $_POST['amount'];
// 		$qunatity = $_POST['qunatity'];
// 		// $sn = $_POST['sn'];
// 		// var_dump($sn);
// 		//date_default_timezone_set('India/Kolkata');
// 		$date = date("d-m-Y");


// 		$ins = mysqli_query($con, "INSERT INTO dmi_assets (Asset_Type,Asset_Brand,PO_Date,Order_Received_Date,Total_Amount,Quantity,Created_Date) VALUES ('$type','$brand','$podate','$ordate','$amount','$qunatity','$date')");
// 		$snins = mysqli_query($con, "INSERT INTO dmi_asset_sn (Asset_SN) VALUES ('$sn[0]')");
// 		if ($ins && $snins) {
// 			echo "Data Saved Successfully";
// 		}
// 		else{
// 			echo "Sorry!";
// 		}
// }
?>

<?php
 include 'templates/footer.php';
?>