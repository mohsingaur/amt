<h3>Vendor</h3>
<div class="resp-table">
<table>
    <tr>
		<?php
			$atcols = mysqli_query($con, "SHOW COLUMNS FROM dmivendoraccounts");
			$i = mysqli_num_rows($atcols);
			while ($cols=mysqli_fetch_assoc($atcols)) {
				echo "<th>".$cols['Field']."</th>";
			}
		?>
		<th>Modify</th>
	</tr>
<?php

$brsql = mysqli_query($con, "SELECT * FROM dmivendoraccounts");
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

            <div class="select">
				<select name="vendorid" class="select_option">
					<option>Select Vendor</option>
					<?php
					$bnsql = mysqli_query($con, "SELECT * FROM dmivendormaster");
					while ($row=mysqli_fetch_array($bnsql)) {
						echo "<option value='$row[VendorId]'>$row[VendorName]</option>";
					}
					?>
				</select>
            </div>

            <div class="input">
                <input type="text" name="vendorname" class="input_field" required />
                <label class="input_label">Vendor Account Manager Name</label>
            </div>

            <div class="input">
                <input type="text" name="vdesignation" class="input_field" required />
                <label class="input_label">Vendor Designation</label>
            </div>

            <div class="input">
                <input type="email" name="vemail" class="input_field" required />
                <label class="input_label">Account Manager Mail Id</label>
            </div>

            <div class="input">
                <input type="text" name="vmobile" class="input_field" required />
                <label class="input_label">Account Manager Mobile Number</label>
            </div>

            <div class="input">
                <input type="text" name="vphone" class="input_field" required />
                <label class="input_label">Account Manager Phone</label>
            </div>

            <div class="input">
                <input type="date" name="vstartdate" class="input_field" required />
                <label class="input_label">Account Manager Start Date</label>
            </div>

            <div class="input">
                <input type="date" name="venddate" class="input_field" />
                <label class="input_label">Account Manager End Date</label>
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
                    $sql = mysqli_query($con,"INSERT INTO dmivendoraccounts (VendorId,VendorAccountManager,Designation,VendorMobile,VendorPhone,VendorEmail,VendorStartDate,VendorEndDate,IsActive) VALUES ('$vendorid','$vendorname','$vdesignation','$vmobile','$vphone','$vemail','$vstartdate','$venddate','$isactive')");
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