<script>
	function GetAssetDetails(n){
		var xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
     		document.getElementById("getastdetails").innerHTML = this.responseText;
    		}
  		};
  		xhttp.open("GET", "handlers/getAssetDetails.php?=",+n true);
  		xhttp.send();
	}
</script>
<div class="container">
    <div class="card">
        <h1 class="card_title">Add Assets</h1>
        <!-- <p class="card_title-info">Pen By Anna Batura</p> -->
        <form class="card_form" method="post">
		<div class="select">
				<select name="pid" class="select_option" onChange='GetAssetDetails(this.value)'>
					<option>Select Quotation Number/Purchase Id</option>
					<?php
						$psql = mysqli_query($con, "SELECT QuotationId,QuotationNumber FROM quotationmaster");
						while($row=mysqli_fetch_array($psql)){
							echo "<option value=".$row[0].">".$row[1]."</option>";
						}
					?>
				</select>
			</div>
			<div class="card_info">
				<p id="getastdetails">
				</p>
			</div>
            <div class="input">
                <input type="text" name="sn" class="input_field" required />
                <label class="input_label">Asset Serial Number</label>
            </div>
            <div class="input">
                <input type="text" name="sc" class="input_field" required />
                <label class="input_label">Asset Service Code </label>
            </div>
			<div class="input">
                <input type="text" name="imei" class="input_field" required />
                <label class="input_label">Asset IMEI number</label>
            </div>
			
			<div class="radio">
				<input type="radio" name="isactive" value="1" /> Active
				<input type="radio" name="isactive" value="0" /> In-Active
			</div>
            <input type="submit" name="save" class="card_button" value="Save">
        </form>
		<div class="card_info">
		<p>
            <?php
                if (isset($_POST['save'])) {
                    extract($_POST);
                    $sql = mysqli_query($con,"INSERT INTO assetmaster (AssetSerialNumber,AssetExpressServiceCode,AssetIMEINumber,AssetPurchaseId,isActive) VALUES ('$sn','$sc','$imei','$pid','$isactive')");
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


<?php
 include 'templates/footer.php';
?>