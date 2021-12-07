
<table border="1">
	<tr>
		<th> ID </th> <th> PO </th> <th> PO Date </th> <th> Invioce </th> <th> Invoice Date </th> <th>Edit</th>
	</tr>

<?php

include 'bin/config.php';

$data = mysqli_query($con, "SELECT * FROM dmi_invoices");
while ($row=mysqli_fetch_assoc($data)) {
	echo "<tr> <td> $row[Invoice_ID] </td> <td> <a href='showfile.php?po=$row[PO_File_Name]'> $row[PO] </a> </td> <td> $row[PO_Date] </td><td> <a href='showfile.php?po=$row[Invoice_File_Name]'> $row[Invoice] </a> </td><td> $row[Invoice_Date] </td> <td> <a href='?edit=$row[Invoice_ID]'>Edit</a> </td> </tr>";
}

?>

</table>

<h2>Add New File </h2>

<form method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>PO</td> <td> <input type="text" name="po" value="<?php echo @$_GET['edit']?>"> </td>
		</tr>
		<tr>
			<td>PO Date</td> <td> <input type="date" name="podate"> </td> <td> <input type="file" name="pofile"> </td>
		</tr>
		<tr>
			<td>Inoice</td> <td> <input type="text" name="invoice"> </td>
		</tr>
		<tr>
			<td>Invoice Date</td> <td> <input type="date" name="invoicedate"> </td> <td> <input type="file" name="invoicefile"> </td>
		</tr>
		<tr>
			<td colspan="2"> <input type="submit" name="save"> </td>
		</tr>
	</table>
</form>


<?php

if (isset($_POST['save'])) {
	$popdf = $_FILES['pofile']['name'];
	$invpdf = $_FILES['invoicefile']['name'];
	extract($_POST);
	$ins = mysqli_query($con, "INSERT INTO dmi_invoices VALUES ('','$po','$popdf','$podate','$invoice','$invpdf','$invoicedate')");
	
	move_uploaded_file($_FILES['pofile']['tmp_name'], "invoices/".$popdf);
	move_uploaded_file($_FILES['invoicefile']['tmp_name'], "invoices/".$invpdf);
	if ($ins) {
		echo "Saved Successfully.";
	}
	else{
		echo "Sorry";
	}
}


?>