<form method="post"> 
	<table>
		<tr>
			<td> <label>Asset Hardware / Details</label> </td> <td> <select name="type"> <option value="Laptop">Laptop</option> <option value="Tablet">Tablet</option> </select> </td>
		</tr>
		<tr>
			<td> <label>Make/Brand</label> </td> <td> <select name="make"> <option value="Dell">Dell</option> <option value="Lenovo">Lenovo</option> <option value="Samsung">Samsung</option> <option value="Apple">Apple</option> </select> </td>
		</tr>
		<tr>
			<td> <label>Model</label> </td> <td> <input type="text" name="model"> </td>
		</tr>
		<tr>
			<td> <label>Asset Serial Number</label> </td> <td> <input type="text" name="sn"> </td>
		</tr>
		<tr>
			<td> <label>Asset status</label> </td> <td> <select name="status"> <option value="new">New</option> <option value="used">Used</option> </select> </td>
		</tr>
		<tr>
			<td> <label>Asset quantity</label> </td> <td> <input type="number" name="quan"> </td>
		</tr>
		<tr>
			<td> <label>Asset Price</label> </td> <td> <input type="text" name="price"> </td>
		</tr>
		<tr>
			<td>Branch </td> <td> <input type="text" name="branch"> </td>
		</tr>
		<tr>
			<td>  </td> <td> <input type="submit" name="save" value="Save"> </td>
		</tr>
	</table>
</form>

<?php
if (isset($_POST['save'])) {
	$type = $_POST['type'];
	$make = $_POST['make'];
	$model = $_POST['model'];
	$assetstatus = $_POST['status'];
	$quantity = $_POST['quan'];
	$sn = $_POST['sn'];
	$price = $_POST['price'];
	$branch = $_POST['branch'];

?>

<br>
<pre>
							To Whom So Ever It May Concern

This is to certify that below <b><?=$quantity?> <?=$make?> <?=$type?> </b> is going from our New Delhi head office to our <b><?=$branch?></b> Branch office for business purposes only.

The price of item is <b><?=$price?></b> each <b><?=$type?></b> and it is NOT FOR SALE.
<table>
	<tr>
		<td>Asset / Hardware Details:</td><td> <b> <?=$type?> </b> </td>
	</tr>
	<tr>
		<td>Make:</td><td> <b> <?=$make?></b> </td>
	</tr>
	<tr>
		<td>Model:</td><td> <b> <?=$model?> </b> </td>
	</tr>
	<tr>
		<td>Serial Number:</td><td> <b> <?=$sn?> </b> </td>
	</tr>
	<tr>
		<td>Asset / Hardware Status:</td><td> <b> <?=$assetstatus?> </b> </td>
	</tr>
	<tr>
		<td>Asset Quantity:</td><td> <b> <?=$quantity?> </b> Nos </td>
	</tr>
</table>

New Delhi Office Address – 
DMI Housing Finance Private Limited
Express Building, Third Floor, 9-10, Bahadur Shah Zafar Marg, New Delhi - 110002



For DMI Housing Finance Pvt. Ltd.
</pre>
<?php
}
?>

