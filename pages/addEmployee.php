<h3>All DMI Employee</h3>
<div class="resp-table"> 
<table>
	<tr>
		<?php
			$mdcols = mysqli_query($con, "SHOW COLUMNS FROM dmiemployeemaster");
			$i = mysqli_num_rows($mdcols);
			while ($cols=mysqli_fetch_assoc($mdcols)) {
				echo "<th>".$cols['Field']."</th>";
			}
		?>
		<th>Modify</th>
	</tr>
<?php

$mdsql = mysqli_query($con, "SELECT * FROM dmiemployeemaster");
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
        <h1 class="card_title">Add Employee Details</h1>
        <form class="card_form" method="post">
			<div class="input">
                <input type="text" name="empname" class="input_field" required />
                <label class="input_label">Employee Name</label>
            </div>

			<div class="input">
                <input type="email" name="officialmail" class="input_field" required />
                <label class="input_label">Employee Official Mail</label>
            </div>

			<div class="input">
                <input type="email" name="personalmail" class="input_field" required />
                <label class="input_label">Employee Personal Mail</label>
            </div>

			<div class="input">
                <input type="text" name="mobile" class="input_field" required />
                <label class="input_label">Employee Mobile Number</label>
            </div>

			<div class="input">
                <input type="date" name="emodoj" class="input_field" required />
                <label class="input_label">Employee Date of Joining</label>
            </div>

			<div class="select">
				<select name="entity" class="select_option">
					<option>Select Employee Supervisor</option>
				<?php
				$entityqry = mysqli_query($con, "SELECT * FROM dmiemployeemaster");
				while($entarr=mysqli_fetch_array($entityqry)){
					echo "<option value='".$entarr['EmpId']."'>".$entarr['EmpName']." [".$entarr['EmpOfficialMail']."]</option>";
				}
				?>
				</select>
			</div>

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
                <select name="joininglocation" class="select_option">
                <option>Select Joining Location</option>
            <?php
                $statesql=mysqli_query($con, "SELECT * FROM branchmaster");
                while($statearr = mysqli_fetch_array($statesql)){
                    echo "<option value=".$statearr['BranchId'].">".$statearr['BranchName']."</option>";
                }
            ?>
                </select>
            </div>

			<div class="select">
                <select name="branchlocation" class="select_option">
                <option>Select Branch Name</option>
            <?php
                $statesql=mysqli_query($con, "SELECT * FROM branchmaster");
                while($statearr = mysqli_fetch_array($statesql)){
                    echo "<option value=".$statearr['BranchId'].">".$statearr['BranchName']."</option>";
                }
            ?>
                </select>
            </div>

			<div class="select">
                <select name="designation" class="select_option">
                <option>Select Designation</option>
            <?php
                $vendorsql=mysqli_query($con, "SELECT * FROM dmiemployeedesignationmaster");
                while($vendorarr = mysqli_fetch_array($vendorsql)){
                    echo "<option value=".$vendorarr['DesignationId'].">".$vendorarr['DesignationName']."</option>";
                }
            ?>
                </select>
            </div>

			<div class="select">
                <select name="department" class="select_option">
                <option>Select Department</option>
            <?php
                $assettypesql=mysqli_query($con, "SELECT * FROM dmidepartmentmaster");
                while($assettypearr = mysqli_fetch_array($assettypesql)){
                    echo "<option value=".$assettypearr['DepartmentId'].">".$assettypearr['DepartmentName']."</option>";
                }
            ?>
                </select>
            </div>

			<div class="select">
                <select name="empstatus" class="select_option">
                <option>Select Employee Status</option>
            <?php
                $quotesql=mysqli_query($con, "SELECT * FROM employeestatusmaster");
                while($quotearr = mysqli_fetch_array($quotesql)){
                    echo "<option value=".$quotearr['EmployeeStatusId'].">".$quotearr['EmployeeStatusName']."</option>";
                }
            ?>
                </select>
            </div>

			<div class="radio">    
                <input type="radio" name="isrequired" value="0"> Yes
                <input type="radio" name="isrequired" value="1" checked> No
				<label>Asset Required</label>
            </div> 

			<div class="select">
                <select name="assetid" class="select_option">
                <option>Select Asset</option>
            <?php
                $brandsql=mysqli_query($con, "SELECT * FROM dmiassetmaster");
                while($brandarr = mysqli_fetch_array($brandsql)){
                    echo "<option value=".$brandarr['AssetId'].">".$brandarr['AssetSerialNumber']."-[".$brandarr['AssetHostname']."]</option>";
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