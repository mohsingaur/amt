<?php
	include 'bin/config.php';
	include 'templates/header.php';
?>

<h3>Employee List</h3>

<div class="resp-table">
<table>
	<tr>
		<?php
			$colsqr = mysqli_query($con, "SHOW COLUMNS FROM dmiemployees");
			$i = mysqli_num_rows($colsqr);
			while ($cols=mysqli_fetch_assoc($colsqr)) {
				echo "<th>".$cols['Field']."</th>";
			}
		?>
		<th>Modify</th>
	</tr>
	<?php
		$dataqr = mysqli_query($con, "SELECT * FROM dmiemployees");
		while($row=mysqli_fetch_array($dataqr)){
			if ($row['Deleted_Employee']==0) {
				echo " ";
			}
			else{
				if ($row['10']==1) {
					$row['10']="Active";
				}
				else{
					$row['10']="Resign";
				}
			echo "<tr>";
				for ($j=0; $j < $i; $j++) { 
					echo "<td>".$row[$j]."</td>";
				}
			echo "<td> <a href=''>Edit</a>/<a href='?delid=$row[0]'>Delete</a> </td>
					</tr>";
				}
		}
	?>

<tr>
<form method="post" action="" enctype="multipart/form-data">
			
					<td>Employee Code <input type="number" name="Emp_Code"></td>
				
					<td>Employee Name <input type="text" name="Employe_name"></td>
				
					<td>Joinig Date <input type="date" name="Joining_Date"></td>
			
					<td>Supervisor Name <input type="text" name="Supervisor"></td>
			
					<td>Mobile No <input type="text" name="Contact_Number"></td>
			
					<td>Designation <input type="text" name="Designation"></td>
				
					<td>Personal Email Id <input type="text" name="Personal_Mail"></td>
				
					<td>Official Email Id <input type="text" name="Official_Mail"></td>
				
					<td>Entity Name <select name="Emp_Entity">
						<option> <--Select Entity--></option>
					<?php
						$ensql = mysqli_query($con, "SELECT * FROM dmi_entity");
						while ($row=mysqli_fetch_array($ensql)) {
						echo "<option value=".$row['2'].">$row[1]</option>";
						}
					?>
					</select> 
					</td>
					<td>Branch <select name="Emp_Branch_ID">
						<option> <--Select Branch--></option>
					<?php
						$brsql = mysqli_query($con, "SELECT * FROM dmi_branches");
						while ($row1=mysqli_fetch_array($brsql)) {
						echo "<option value=".$row1['2'].">".$row1['1']."</option>";
						}
					?>
					</select>
					</td>				
					<td>Status <input type="checkbox" name="Emp_Status" value="1" checked> Active</td>
					<td> <input type="submit" name="save" value="save"> </td>
		</form>
	</tr>
</table>
</div>
<?php
if (isset($_POST['save'])) {
	$Emp_Code = $_POST['Emp_Code'];
	$Employe_name = $_POST['Employe_name'];
	$Contact_Number = $_POST['Contact_Number'];
	$Designation = $_POST['Designation'];
	$Supervisor = $_POST['Supervisor'];
	$Personal_Mail = $_POST['Personal_Mail'];
	$Official_Mail = $_POST['Official_Mail'];
	$Emp_Entity = $_POST['Emp_Entity'];
	$Emp_Branch_ID = $_POST['Emp_Branch_ID'];
	$Joining_Date = $_POST['Joining_Date'];
	$Emp_Status = $_POST['Emp_Status'];
	$Delete_Employee = 1;

// $sql = sprintf(
// 		"INSERT INTO %s (%s) values (%s)",
// 		"dmi_employee_details",
// 		implode(",", array_keys($new_emp)),
// 		"'$".implode("','$",array_keys($new_emp))
// );

//var_dump($sql);

$sql = mysqli_query($con,"INSERT INTO dmiemployees VALUES ('','$Emp_Code','$Employe_name','$Contact_Number','$Designation','$Supervisor','$Personal_Mail','$Official_Mail','$Joining_Date','','$Emp_Status','$Emp_Entity','','$Emp_Branch_ID','$Delete_Employee')");

if ($sql) {
	echo "Save";
}
else{
	echo "Sorry!";
}
}
?>


<?php
if (isset($_GET['delid'])) {
	$delete = $_GET['delid'];
	$del = mysqli_query($con,"UPDATE dmiemployees SET Deleted_Employee=0 WHERE Emp_ID=$delete");
	if ($del) {
		echo "<script> alert('Data has been deleted.') </script>";
	}
	else{
		echo "<script> alert('Something Goes wrong!') </script> ";
	}
}
?>
	

<?php
 include 'templates/footer.php';
?>