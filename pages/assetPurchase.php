<h3>All PO</h3>
<div class="resp-table"> 
<table>
	<tr>
		<?php
			$mdcols = mysqli_query($con, "SHOW COLUMNS FROM assetpurchasemaster");
			$i = mysqli_num_rows($mdcols);
			while ($cols=mysqli_fetch_assoc($mdcols)) {
				echo "<th>".$cols['Field']."</th>";
			}
		?>
		<th>Modify</th>
	</tr>
<?php

$mdsql = mysqli_query($con, "SELECT * FROM assetpurchasemaster");
while ($row=mysqli_fetch_array($mdsql)) {
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
        <h1 class="card_title">New Asset Purchase</h1>
        <p class="card_title-info">Create New PO</p>
        <form class="card_form" method="post">
            <div class="select">
				<select name="entity" class="select_option">
					<option>Select Entity Name</option>
				<?php
				$entityqry = mysqli_query($con, "SELECT * FROM entitymaster");
				while($entarr=mysqli_fetch_array($entityqry)){
					echo "<option value='".$entarr['DmiEntityId']."'>".$entarr['DmiEntityName']."</option>";
				}
				?>
				</select>
			</div>
			
            <div class="select">
                <select name="purchaselocation" class="select_option">
                <option>Select Purchase Location</option>
            <?php
                $statesql=mysqli_query($con, "SELECT * FROM branchmaster");
                while($statearr = mysqli_fetch_array($statesql)){
                    echo "<option value=".$statearr['BranchId'].">".$statearr['BranchName']."</option>";
                }
            ?>
                </select>
            </div>

			<div class="select">
                <select name="vendorname" class="select_option">
                <option>Select Vendor Name</option>
            <?php
                $vendorsql=mysqli_query($con, "SELECT * FROM dmivendormaster");
                while($vendorarr = mysqli_fetch_array($vendorsql)){
                    echo "<option value=".$vendorarr['VendorId'].">".$vendorarr['VendorName']."</option>";
                }
            ?>
                </select>
            </div>

			<div class="select">
                <select name="assettype" class="select_option">
                <option>Select Asset Type</option>
            <?php
                $assettypesql=mysqli_query($con, "SELECT * FROM assettypemaster");
                while($assettypearr = mysqli_fetch_array($assettypesql)){
                    echo "<option value=".$assettypearr['AssetTypeId'].">".$assettypearr['AssetType']."</option>";
                }
            ?>
                </select>
            </div>

			<div class="select">
                <select name="quote" class="select_option">
                <option>Select Quotation</option>
            <?php
                $quotesql=mysqli_query($con, "SELECT * FROM quotationmaster");
                while($quotearr = mysqli_fetch_array($quotesql)){
                    echo "<option value=".$quotearr['QuotationId'].">".$quotearr['QuotationNumber']."-".$quotearr['QuotationName']."-[".$quotearr['QuotationItemQuantity']."]</option>";
                }
            ?>
                </select>
            </div>

			

			<div class="select">
                <select name="brand" class="select_option">
                <option>Select Asset Brand</option>
            <?php
                $brandsql=mysqli_query($con, "SELECT * FROM assetbrandmaster");
                while($brandarr = mysqli_fetch_array($brandsql)){
                    echo "<option value=".$brandarr['AssetBrandId'].">".$brandarr['AssetBrandName']."</option>";
                }
            ?>
                </select>
            </div>

			<div class="select">
                <select name="model" class="select_option">
                <option>Select Model</option>
            <?php
                $modelsql=mysqli_query($con, "SELECT * FROM assetmodelmaster");
                while($modelarr = mysqli_fetch_array($modelsql)){
                    echo "<option value=".$modelarr['AssetModelId'].">".$modelarr['AssetModelName']."</option>";
                }
            ?>
                </select>
            </div>

			<div class="select">
                <select name="processor" class="select_option">
                <option>Select Processor</option>
            <?php
                $processorsql=mysqli_query($con, "SELECT * FROM assetprocessormaster");
                while($processorarr = mysqli_fetch_array($processorsql)){
                    echo "<option value=".$processorarr['ProcessorId'].">".$processorarr['ProcessorName']."</option>";
                }
            ?>
                </select>
            </div>

			<div class="select">
                <select name="storage" class="select_option">
                <option>Select Storage Type</option>
            <?php
                $storagesql=mysqli_query($con, "SELECT * FROM assetstoragetypemaster");
                while($storagearr = mysqli_fetch_array($storagesql)){
                    echo "<option value=".$storagearr['StorageTypeId'].">".$storagearr['StorageTypeName']."</option>";
                }
            ?>
                </select>
            </div>

			<div class="select">
                <select name="storagesize" class="select_option">
                <option>Select Storage Size</option>
            <?php
                $storagesizesql=mysqli_query($con, "SELECT * FROM assetstoragesizemaster");
                while($storagesizearr = mysqli_fetch_array($storagesizesql)){
                    echo "<option value=".$storagesizearr['StorageSizeId'].">".$storagesizearr['StorageSize']." GB</option>";
                }
            ?>
                </select>
            </div>

			<div class="select">
                <select name="ram" class="select_option">
                <option>Select RAM Type</option>
            <?php
                $ramtypesql=mysqli_query($con, "SELECT * FROM assetramtypemaster");
                while($ramtypearr = mysqli_fetch_array($ramtypesql)){
                    echo "<option value=".$ramtypearr['AssetRAMTypeId'].">".$ramtypearr['AssetRAMType']."</option>";
                }
            ?>
                </select>
            </div>

			<div class="select">
                <select name="ramsize" class="select_option">
                <option></option>
            <?php
                $storagesql=mysqli_query($con, "SELECT * FROM assetstoragesizemaster");
                while($storagearr = mysqli_fetch_array($storagesql)){
                    echo "<option value=".$storagearr['StorageSizeId'].">".$storagearr['StorageSize']." GB</option>";
                }
            ?>
                </select>
				<label class="input_label">Select Ram size</Select></label>
            </div>

			<div class="input">
                <input type="text" name="quantity" class="input_field" required />
                <label class="input_label">Asset Quantity</label>
            </div>

			<div class="input">
                <input type="text" name="display" class="input_field" required />
                <label class="input_label">Display Size</label>
            </div>

			<div class="input">
                <input type="text" name="amount" class="input_field" required />
                <label class="input_label">Total Amount</label>
            </div>

			<div class="input">
                <input type="date" name="podate" class="input_field" required />
                <label class="input_label">PO Date</label>
            </div>

			<div class="input">
                <input type="date" name="invoicedate" class="input_field" required />
                <label class="input_label">Invoice Date</label>
            </div>
	
			<div class="input">
                <input type="text" name="invoicenumber" class="input_field" required />
                <label class="input_label">Invoice Number</label>
            </div>

			<div class="input">
                <input type="date" name="delieveydate" class="input_field" required />
                <label class="input_label">Asset Delievey Date </label>
            </div>

			<div class="radio">    
				<label>Is Ram Upgraded:&nbsp;&nbsp;</label>            
                <input type="radio" name="isramupgrade" value="0" onclick="showRamCard(this.value)" checked > No
                <input type="radio" name="isramupgrade" value="1" onclick="showRamCard(this.value)" > Yes
				
            </div>  

			<div id="ram_card">

			<div class="select">
                <select name="upgradedramtype" class="select_option">
                <option>Select Upgraded RAM Type</option>
            <?php
                $ramtypesql=mysqli_query($con, "SELECT * FROM assetramtypemaster");
                while($ramtypearr = mysqli_fetch_array($ramtypesql)){
                    echo "<option value=".$ramtypearr['AssetRAMTypeId'].">".$ramtypearr['AssetRAMType']."</option>";
                }
            ?>
                </select>
            </div>

			<div class="select">
                <select name="upgradedramsize" class="select_option">
                <option>Select Upgraded RAM Size</option>
            <?php
                $storagesql=mysqli_query($con, "SELECT * FROM assetstoragesizemaster");
                while($storagearr = mysqli_fetch_array($storagesql)){
                    echo "<option value=".$storagearr['StorageSizeId'].">".$storagearr['StorageSize']." GB</option>";
                }
            ?>
                </select>
            </div>
			
			</div>

			<div class="input">
                <input type="text" name="peripherals" class="input_field" required />
                <label class="input_label">Add Any Additional Assets with comma</label>
            </div>

			<div class="select">
                <select name="defaultos" class="select_option">
                <option>Select Default Operating System</option>
            <?php
                $ramtypesql=mysqli_query($con, "SELECT * FROM operatingsystemmaster");
                while($ramtypearr = mysqli_fetch_array($ramtypesql)){
                    echo "<option value=".$ramtypearr['OperatingSystemId'].">".$ramtypearr['OperatingSystemName']."</option>";
                }
            ?>
                </select>
            </div>
			
            <div class="radio">                
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
                    $sql = mysqli_query($con,"INSERT INTO assetpurchasemaster (EntityId,AssetPurchaseLocation,VendorId,QuotationId,BrandId,ModelId,AssetType,ProcessorType,StorageType,RAMType,RAMSize,SecondaryStorageSize,DisplaySize,DefaultOS,AssetQuantity,TotalAmount,PODate,InvoiceDate,InvoiceNumber,AssetDelieveyDate,IsRAMUpgrade,UpgradedRAMType,UpgradedRAMSize,PeripheralsList,IsActive) VALUES ('$entity','$purchaselocation','$vendorname','$quote','$brand','$model','$assettype','$processor','$storage','$ram','$ramsize','$storagesize','$display','$defaultos','$quantity','$amount','$podate','$invoicedate','$invoicenumber','$delieveydate','$isramupgrade','$upgradedramtype','$upgradedramsize','$peripherals','$isactive')");
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