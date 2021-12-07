<!DOCTYPE html>
<html>
<head>
	<title>Asset Details</title>
	<style type="text/css">
		table{
			border-collapse: collapse;
		}
	</style>

	
</head>
<body>

<table border="1" style="clear: both;">
		<tr>
			<th>Emp Id</th> <th> Emp Name </th> <th> Designation </th> <th> Supervisor </th> <th> Official Mail </th> <th> Personal Mail </th> <th> Entity </th> <th> Branch </th> <th> Emp Status </th> <th> Joining Date </th> <th> Mobile Number </th> <th> Laptop </th> <th> Tablet </th> <th> Dongle </th> <th> JioFi </th>
		</tr>
<?php

include 'bin/config.php';

$sel = mysqli_query($con,"SELECT * FROM asset_details");
$lap = "";
$jio = "";
$don = "";
$tab = "";
while ($row=mysqli_fetch_assoc($sel)) {
	if ($row['laptop']=="1") {
		$lap = "&#9989;";
	}
	else{
		$lap = "&#9746;";
	}

	if ($row['jio']=="1") {
		$jio = "&#9989;";
	}
	else{
		$jio = "&#9746;";
	}

	if ($row['dongle']=="1") {
		$don = "&#9989;";
	}
	else{
		$don = "&#9746;";
	}
	
	if ($row['tablet']=="1") {
		$tab = "&#9989;";
	}
	else{
		$tab = "&#9746;";
	}
?>
		<tr>
			<td><?=$row['empid']?></td> <td><?=$row['empname']?></td> <td><?=$row['designation']?></td> <td><?=$row['supervisor']?></td> <td><?=$row['omail']?></td> <td><?=$row['pmail']?></td> <td><?=$row['entityname']?></td> <td><?=$row['branch']?></td> <td><?=$row['empstatus']?></td> <td><?=$row['joiningdate']?> </td> <td><?=$row['mnumb']?></td> <td><?=$lap?></td> <td><?=$tab?></td> <td><?=$don?></td> <td><?=$jio?></td>
		</tr>
<?php
}

?>

</table>


</body>
</html>
<?php



?>