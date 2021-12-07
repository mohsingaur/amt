<?php
	include 'templates/header.php';
	include 'bin/config.php';
?>

<h3>All Entity</h3>
<div class="resp-table">
<table>
	<tr>
		<?php
			$brcols = mysqli_query($con, "SHOW COLUMNS FROM entitymaster");
			$i = mysqli_num_rows($brcols);
			while ($cols=mysqli_fetch_assoc($brcols)) {
				echo "<th>".$cols['Field']."</th>";
			}
		?>
		<th>Modify</th>
	</tr>
<?php

$brsql = mysqli_query($con, "SELECT * FROM entitymaster");
while ($row=mysqli_fetch_array($brsql)) {
	echo "<tr> <td>".$row['0']."</td> <td> $row[1] </td> <td> $row[2] </td> <td> $row[3] </td> <td> $row[4] </td> <td> $row[5] </td> <td> <a href=''>Edit</a> / <a href=''>Delete</a> </td> </tr>";
}
?>

<tr>
<form method="post">
	<td></td>
	<td> <input type="text" name="entname" placeholder="Entity Name"> </td>
	<td> <input type="text" name="entkey" placeholder="Entity Abbreviation"> </td>
	<td>
		<select name='entstatus'>
			<option value="1">Active</option>
			<option value="0">InActive</option>
		</select>
	</td>
	<td> <input type="submit" name="save" value="Save"> </td>
</form>
</tr>
</table>
</div>
<?php

if (isset($_POST['save'])) {
	$enm = $_POST['entname'];
	$ek = $_POST['entkey'];
	$es = $_POST['entstatus'];
	
$sql = mysqli_query($con,"INSERT INTO entitymaster (DmiEnitityName,DmiEntityAbbreviation,IsActive) VALUES ('$enm','$ek','$es')");
if ($sql) {
	echo "Saved Successfully...";
}
}


	include 'templates/footer.php';
?>