<h3>Vendor</h3>
<div class="resp-table">
<table>
    <tr>
		<?php
			$atcols = mysqli_query($con, "SHOW COLUMNS FROM dmivendormaster");
			$i = mysqli_num_rows($atcols);
			while ($cols=mysqli_fetch_assoc($atcols)) {
				echo "<th>".$cols['Field']."</th>";
			}
		?>
		<th>Modify</th>
	</tr>
<?php

$brsql = mysqli_query($con, "SELECT * FROM dmivendormaster");
while ($row=mysqli_fetch_array($brsql)) {
	echo "<tr>";
	for ($j=0; $j < $i ; $j++) { 
		echo "<td>".$row[$j]."</td>";
	}
	echo "<td> <a href=''>Edit</a> / <a href=''>Delete</a> </td> </tr>";
}
?>
</table>
</div>

<div class="container">
    <div class="card">
        <h1 class="card_title">Add New Vendor</h1>
        <p class="card_title-info"></p>
        <form class="card_form" method="post">
            <div class="input">
                <input type="text" name="vendorname" class="input_field" required />
                <label class="input_label">Vendor Name</label>
            </div>

            <div class="input">
                <input type="text" name="vendoradd" class="input_field" required />
                <label class="input_label">Vendor Address</label>
            </div>

            <div class="input">                
                <input type="radio" name="isactive" value="0"> In-Active
                <input type="radio" name="isactive" value="1" checked> Active
            </div>
            
            <input type="submit" class="card_button" name="save" value="Save">
        </form>
        <div class="card_info">
            <p>
            <?php
                if (isset($_POST['save'])) {
                    extract($_POST);
                    $sql = mysqli_query($con,"INSERT INTO dmivendormaster (VendorName,VendorFullAddress,IsActive) VALUES ('$vendorname','$vendoradd','$isactive')");
                    if ($sql) {
                        echo "Saved Successfully...";
                    }
                    else{
                        echo "Sorry!";
                    }
                }
            ?>
            </p>
        </div>
    </div> 
</div>


<?php include 'templates/footer.php'; ?>