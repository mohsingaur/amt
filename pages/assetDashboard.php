<h2>Assets</h2>
<div class="resp-table">
<table>
    <tr>
		<?php
			$ascols = mysqli_query($con, "SHOW COLUMNS FROM dmiassets");
			$i = mysqli_num_rows($ascols);
			while ($cols=mysqli_fetch_assoc($ascols)) {
				echo "<th>".$cols['Field']."</th>";
			}
		?>
		<th>Modify</th>
	</tr>
<?php
$snrec = mysqli_query($con, "SELECT * FROM dmiassets");
while ($c=mysqli_fetch_array($snrec)) {
	echo "<tr> <td>".$c[1]."</td> <td>".$c[2]."</td> <td>".$c[3]."</td> <td>".$c[4]."</td> <td>".$c[5]."</td> <td>".$c[6]."</td> <td> <a href='?sn=$c[8]'>Show</a> </td> </tr>";
}
?>
</table>
</div>

<?php
@$getsn = $_GET['sn'];
if ($getsn) {
	echo "<div id='sndiv' style='padding: 10px; margin-left:35px; background: #ef0476; color: #fff; width: 200px;'>";
	$sns = mysqli_query($con, "SELECT * FROM dmiassets WHERE AssetPurchaseId = '$getsn' ");
	while($fetchsn=mysqli_fetch_assoc($sns)){
		echo "S/N: ".$fetchsn['Asset_SN']."<br>";
	}
	echo "</div>";
}
else{
	echo " ";
}
	
?>


<script type="text/javascript">
	function showsn(x) {
		alert(x);
		document.getElementById('sndiv').style.display = "block";
	}
</script>



<a style="margin-left: 35px;" href="laptopPurchase.php">New Purchase</a>
	

<?php
 include 'templates/footer.php';
?>